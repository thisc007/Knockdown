<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FilesController extends AppController
{
  
    public function addpic()
    {
        $uid = $this->request->Session()->read('Auth.User.id');
        $archive = $this->Files->newEntity();
        if ($this->request->is('post'))
        {

            if ($_FILES['userfile']['size'] > 716800)
            {
                $this->Flash->warning('Arquivo acima de 700KB -> ' . $_FILES['userfile']['size'] . ' Bytes');
                return $this->redirect(['controller' => $this->request->data('controller'), 'action' => 'aboutme', $this->request->data('controllerId')]);
            }
            elseif ($_FILES['userfile']['size'] == 0)
            {
                $this->Flash->warning('Arquivo corrompido. Tente fazer novamente o envio. Caso persista o erro, por gentileza, abra uma requisição de serviço relatando o código de erro a seguir: ' . $_FILES['userfile']['error']);
                return $this->redirect(['controller' => $this->request->data('controller'), 'action' => 'aboutme', $this->request->data('controllerId')]);
            }
            //$this->Flash->warning($_FILES['userfile']['error']);
            $name = $_FILES['userfile']['name'];
            //$this->Flash->warning($name);
            $LetraProibi = Array(" ", ",",  "'", "\"", "&", "|", "!", "#", "$", "¨", "*", "(", ")", "`", "´", "<", ">", ";", "=", "+", "§", "{", "}", "[", "]", "^", "~", "?", "%");
            $special = Array('Á', 'È', 'ô', 'Ç', 'á', 'è', 'Ò', 'ç', 'Â', 'Ë', 'ò', 'â', 'ë', 'Ø', 'Ñ', 'À', 'Ð', 'ø', 'ñ', 'à', 'ð', 'Õ', 'Å', 'õ', 'Ý', 'å', 'Í', 'Ö', 'ý', 'Ã', 'í', 'ö', 'ã',
                'Î', 'Ä', 'î', 'Ú', 'ä', 'Ì', 'ú', 'Æ', 'ì', 'Û', 'æ', 'Ï', 'û', 'ï', 'Ù', '®', 'É', 'ù', '©', 'é', 'Ó', 'Ü', 'Þ', 'Ê', 'ó', 'ü', 'þ', 'ê', 'Ô', 'ß', '‘', '’', '‚', '“', '”', '„');
            $clearspc = Array('a', 'e', 'o', 'c', 'a', 'e', 'o', 'c', 'a', 'e', 'o', 'a', 'e', 'o', 'n', 'a', 'd', 'o', 'n', 'a', 'o', 'o', 'a', 'o', 'y', 'a', 'i', 'o', 'y', 'a', 'i', 'o', 'a',
                'i', 'a', 'i', 'u', 'a', 'i', 'u', 'a', 'i', 'u', 'a', 'i', 'u', 'i', 'u', '', 'e', 'u', 'c', 'e', 'o', 'u', 'p', 'e', 'o', 'u', 'b', 'e', 'o', 'b', '', '', '', '', '', '');
            $name = str_replace($special, $clearspc, $name);
            $name = str_replace($LetraProibi, "", trim($name));
            $arr = explode(".", ($name));
            $ext = strtolower(end($arr));
            $size = intval($_FILES['userfile']['size']);
            if (!empty($_FILES["userfile"]["name"]))
            {

                if (strpos($_FILES['userfile']['type'], 'image') === false)
                {
                    $this->Flash->warning('Tipo de arquivo não corresponde a uma imagem válida.');
                    return $this->redirect(['controller' => $this->request->data('controller'), 'action' => 'aboutme', $this->request->data('controllerId')]);
                }
                else
                {
                    $del = TableRegistry::get('files')
                            ->query()
                            ->delete()
                            ->where('controller=\'' . $this->request->data('controller') . '\'')
                            ->andWhere('controllerId=' . $this->request->data('controllerId'))
                            ->andWhere('description = \'Foto de Perfil\'')
                            ->execute()
                    ;

                    $archive = TableRegistry::get('files')
                            ->query()
                            ->insert(['created', 'name', 'extension', 'controller', 'controllerId', 'size', 'description','content'])
                            ->values(
                            [
                                'created' => date("Y-m-d H:i:s"),
                                'name' => $name,
                                'extension' => $ext,
                                'controller' => $this->request->data('controller'),
                                'controllerId' => $this->request->data('controllerId'),
                                'size' => $size,
                                'description' => 'Foto de Perfil', 
                                'content' => base64_encode(file_get_contents($_FILES['userfile']["tmp_name"])),
                                    
                                
                                
                            ]
                    );
                }

                if ($archive->execute())
                {
                    $this->Flash->success(__('Foto alterada.'));    
                    return $this->redirect(['controller' => $this->request->data('controller'), 'action' => 'view', $this->request->data('controllerId')]);
                    
                }
                else
                {
                    $this->Flash->error(__('Não foi possível enviar o arquivo. Por favor, tente novamente.'));
                }
            }
            else
            {
                $this->Flash->warning(__('Erro: sem arquivo'));
            }
        }
        $ctrl = $this->request->query('ctrl');
        $ctrlid = $this->request->query('ctrlid');
        $this->set(compact('archive', 'ctrlid', 'ctrl'));
        $this->set('_serialize', ['archive']);
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);
        if ($this->Files->delete($file)) {
            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
