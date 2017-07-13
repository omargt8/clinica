<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Patients Controller
 *
 * @property \App\Model\Table\PatientsTable $Patients
 */
class PatientsController extends AppController
{

    public function procphp()
    {
        $q=$_POST['q'];
        $con=$this->conexion();
        //Arreglando que cuando se seleccione "(Seleccione)" no de error
        if($q > 0)
        {
            $res=mysql_query("select * from careers where hid = 1 and faculty_id=".$q."",$con);
        ?>
            <label>* Carrera</label>
            <select id="career" name="career_id" class="form-control" required>
            <option value="">(Seleccione)</option>
            <?php while($fila=mysql_fetch_array($res))
            { ?>
                <option value="<?php echo $fila['id']; ?>"><?php echo $fila['name']; ?></option>
                <?php 
            } ?>
            </select>
            </br>
        <?php
        }

        $this->autoRender = false;
    }


    public function conexion()
    {
        $con = mysql_connect("localhost","root","supermetroidgt8");
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("clinica", $con);

        return($con);
        $this->autoRender = false;
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'views')
        {
            if(in_array($this->request->action, ['home', 'logout', 'index', 'view', 'search', 'preview']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    public function index()
    {
        $patients = $this->paginate($this->Patients,[
            'contain' => ['Faculties', 'Careers']
        ]);
        $this->set('patients', $patients);
    }


    public function search()
    {
        $search = null;
        if(!empty($this->request->query['search']))
        {
            $search = $this->request->query['search'];
            $search = preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
            $terms = explode(' ', trim($search));
            $terms = array_diff($terms, array(''));
            

            foreach($terms as  $term)
            {
                $conditions[] = array('patients.carnet LIKE' => $term);
            }
            $patient = $this->Patients->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 50));
         //   if(count($patient) == 1)
           // {
               // return $this->redirect(['controller' => 'Patients', 'action' => 'view']);
            //}
            $this->set('search', $search);
            $this->set(compact('patient'));
        }
    }

    public function update()
    { 
        if(date('m') >= 7)
        {
            $query = $this->Patients->query();
            $query->update()
            ->set(['income' => 'antiguo ingreso'])
            ->where(function ($exp, $q){
                $month = $q->func()->month([
                    'created' => 'identifier'
                ]);
                return $exp
                    ->lte($month, '6');
            })
            ->execute();
            $this->Flash->success('Los Pacientes han sido actualizados!');
        }
        else
        {
        //Se ejecutará unicamente cuando sea un mes menor a junio.
            $query = $this->Patients->query();
            $query->update()
            ->set(['income' => 'antiguo ingreso'])
            ->where(function ($exp, $q){
                $year = $q->func()->year([
                    'created' => 'identifier'
                ]);
                return $exp
                    ->lt($year, date("Y"));
            })
            ->execute();
            $this->Flash->success('Los Pacientes han sido actualizados!');
        }
    }

  
    public function add()
    {
        $patient = $this->Patients->newEntity();

        if($this->request->is('post'))
        {
            $patient = $this->Patients->patchEntity($patient, $this->request->data);

            if($this->Patients->save($patient))
            {
                $this->Flash->success('El paciente ha sido creado correctamente');
                return $this->redirect(['controller' => 'Allergys', 'action' => 'add', $patient->id]);
            }
            else
            {
                $this->Flash->error('El paciente no pudo ser creado');
            }
        }

        $faculties = $this->Patients->Faculties->find('list', ['limit' => 200])->where(['faculties.hid' => true]);
        $this->set(compact('patient', 'faculties'));
    }   

    public function view($id)
    {
        $patient = $this->Patients->get($id, [
            'contain' => ['Careers', 'Faculties']
        ]);
        $this->set('patient', $patient);

//Imprimir el PDF
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'User_' . $id . '.pdf'
            ]
        ]);
    }

    public function edit($id = null)
    {
        $patient = $this->Patients->get($id);

        if($this->request->is(['patch', 'post', 'put']))
        {
            $patient = $this->Patients->patchEntity($patient, $this->request->data);
            if($this->Patients->save($patient))
            {
                $this->Flash->success('El paciente ha sido modificado');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('El paciente no pudo ser modificado');
            }
        }
        $faculties = $this->Patients->Faculties->find('list', ['limit' => 200]);
        $this->set(compact('patient', 'faculties'));
    }

    public function delete($id =null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $patient = $this->Patients->get($id);

        if($this->Patients->delete($patient))
        {
            $this->Flash->success('El paciente ha sido eliminado');
        }
        else
        {
            $this->Flash->error('El paciente no pudo ser eliminado');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function preview($id)
    {
        $patient = $this->Patients->get($id, [
            'contain' => ['Careers', 'Faculties']
        ]);

        //Alergias
        $allergy = $this->Patients->Allergys->find('all')->where(['patient_id' => $id])->first();
        //Habitos alimenticios
        $eathabit = $this->Patients->Eathabits->find('all')->where(['patient_id' => $id])->first();
        //Inmunizaciones
        $immunization = $this->Patients->Immunizations->find('all')->where(['patient_id' => $id])->first();
        //Enfermedades hereditarios
        $inheritance = $this->Patients->Inheritances->find('all')->where(['patient_id' => $id])->first();
        //Estilos de vida
        $lifestyle = $this->Patients->Lifestyles->find('all')->where(['patient_id' => $id])->first();
        //Datos no patológicos
        $nonpathological = $this->Patients->Nonpathologicals->find('all')->where(['patient_id' => $id])->first();
        //Datos obstetricos
        $obstetric = $this->Patients->Obstetrics->find('all')->where(['patient_id' => $id])->first();
        //Datos patológicos
        $pathological = $this->Patients->Pathologicals->find('all', array('contain' => 'Zoonosis'))->where(['patient_id' => $id])->first();
        //Datos patológicos si no hay zooonosis
        $pat = $this->Patients->Pathologicals->find('all')->where(['patient_id' => $id])->first();
        //Adicciones
        $addiction = $this->Patients->Addictions->find('all')->where(['patient_id' => $id])->first();
        //Presencia de stress
        $pstres = $this->Patients->Pstress->find('all')->where(['patient_id' => $id])->first();
        //Sintomas
        $symptom = $this->Patients->Symptoms->find('all')->where(['patient_id' => $id])->first();

        $this->set('patient', $patient);
        $this->set('allergy', $allergy);
        $this->set('eathabit', $eathabit);
        $this->set('immunization', $immunization);
        $this->set('inheritance', $inheritance);
        $this->set('lifestyle', $lifestyle);
        $this->set('nonpathological', $nonpathological);
        $this->set('obstetric', $obstetric);
        $this->set('pathological', $pathological);
        $this->set('pat', $pat);
        $this->set('addiction', $addiction);
        $this->set('pstres', $pstres);
        $this->set('symptom', $symptom);

          $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Paciente_' . $patient->first_name . '.pdf',
                'margin' => [
                    'bottom' => 10,
                    'left' => 5,
                    'right' => 5,
                    'top' => 10
        ],
         'options' => [
            'print-media-type' => false,
            'outline' => true,
            'dpi' => 96
        ]
            ]
        ]);
    }

    
    public function preedit($id)
    {
//Si se tiene alguna duda revisar el método preview
        $patient = $this->Patients->get($id);

        $allergy = $this->Patients->Allergys->find('all')->where(['patient_id' => $id])->first();
        $eathabit = $this->Patients->Eathabits->find('all')->where(['patient_id' => $id])->first();
        $immunization = $this->Patients->Immunizations->find('all')->where(['patient_id' => $id])->first();
        $inheritance = $this->Patients->Inheritances->find('all')->where(['patient_id' => $id])->first();
        $lifestyle = $this->Patients->Lifestyles->find('all')->where(['patient_id' => $id])->first();
        $nonpathological = $this->Patients->Nonpathologicals->find('all')->where(['patient_id' => $id])->first();
        $obstetric = $this->Patients->Obstetrics->find('all')->where(['patient_id' => $id])->first();
        $pathological = $this->Patients->Pathologicals->find('all')->where(['patient_id' => $id])->first();
        $addiction = $this->Patients->Addictions->find('all')->where(['patient_id' => $id])->first();
        $pstres = $this->Patients->Pstress->find('all')->where(['patient_id' => $id])->first();
        $symptom = $this->Patients->Symptoms->find('all')->where(['patient_id' => $id])->first();

        $this->set('patient', $patient);
        $this->set('allergy', $allergy);
        $this->set('eathabit', $eathabit);
        $this->set('immunization', $immunization);
        $this->set('inheritance', $inheritance);
        $this->set('lifestyle', $lifestyle);
        $this->set('nonpathological', $nonpathological);
        $this->set('obstetric', $obstetric);
        $this->set('pathological', $pathological);
        $this->set('addiction', $addiction);
        $this->set('pstres', $pstres);
        $this->set('symptom', $symptom);
    }

    public function menu()
    {
        return;
    }
}
