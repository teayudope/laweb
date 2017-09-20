<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->user_model->isLogging())
            redirect('login');

        $this->load->model('producto_model');
        $this->load->model('producto_dato_model');
        $this->load->model('linea_model');
        $this->load->model('sublinea_model');
    }

    public function index($page = 0)
    {

        $this->load->library('pagination');
        $config['base_url'] = site_url('producto/index');
        $config['uri_segment'] = 3;
        if ($this->input->post('search')!=""){
            $this->db->like('nombre',$this->input->post('search'));
        }

        $config['total_rows'] = $this->db->count_all_results('producto');
        $config['per_page'] = 10;
        $config['full_tag_open'] = '<ul class="pagination-list">';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li><a class="pagination-link is-current" aria-label="" aria-current="page">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li><span class="pagination-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['first_link'] = '';
        $config['last_link'] = '';
        $config['next_link'] = '<span class="pagination-next">Siguiente</span>';
        $config['prev_link'] = '<span class="pagination-previous">Anterior</span>';
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        if ($this->input->post('search')!=""){
            $data['productos'] = $this->producto_model->find(array(
                'like' => array('nombre'=>$this->input->post('search')),
            ));
        }else{
            $data['productos'] = $this->producto_model->find(array(
                'limit' => $config['per_page'],
                'offset' => $page
            ));
        }
        $this->load->setView('view_js', 'producto/js', $data);
        $this->load->setView('view_content', 'producto/index', $data);
        $this->load->renderView('home');
    }


    public function show($id)
    {
        $data['producto'] = $this->producto_model->findByPk($id);
        $data['producto_datos'] = $this->producto_dato_model->find(array(
            'where' => array('producto_id' => $id)
        ));
        $this->load->setView('view_content', 'producto/show', $data);
        $this->load->renderView('home');
    }

    public function form($id = FALSE, $error = '')
    {

        if ($id == FALSE) {
            $data['form_title'] = 'Nuevo Producto';
            $data['id'] = '';
        } else {
            $data['form_title'] = 'Editar Producto';
            $data['id'] = $id;
            $data['producto'] = $this->producto_model->findByPk($id);
            $data['producto_datos'] = $this->producto_dato_model->find(array(
                'where' => array('producto_id' => $id)
            ));
        }

        $data['lineas'] = $this->linea_model->all();
        $data['sublineas'] = $this->sublinea_model->all();
        if (isset($error['error_name']) && isset($error['msg']))
            $data[$error['error_name']] = $error['msg'];

        $this->load->setView('view_js', 'producto/js', $data);
        $this->load->setView('view_content', 'producto/form', $data);
        $this->load->renderView('home');
    }

    public function save($id = FALSE)
    {

        $producto = NULL;
        $portada = FALSE;
        if ($id != FALSE){
            $producto = $this->producto_model->findByPk($id);
            $portada = TRUE;
        }

        $this->load->library('form_validation');

        $this->form_validation->set_rules('producto[nombre]', 'Nombre del Producto', 'required|max_length[45]');
        $this->form_validation->set_rules('producto[linea]', 'Linea', 'required|integer');
        $this->form_validation->set_rules('producto[sublinea]', 'Sublinea', 'required|integer');
        $this->form_validation->set_rules('producto[marca]', 'Marca', 'required|max_length[45]');
        $this->form_validation->set_rules('producto[precio]', 'Precio', 'required|numeric');
        $this->form_validation->set_rules('producto[mostrar_precio]', 'Mostrar Precio', 'required');
        $this->form_validation->set_rules('producto[moneda]', 'Moneda', 'required');
        $this->form_validation->set_rules('producto[descripcion_corta]', 'Descripci&oacute;n Corta', 'required|max_length[140]');
        $this->form_validation->set_rules('producto[estado]', 'Mostrar', 'required');
        $this->form_validation->set_rules('producto[orden]', 'Orden', 'integer');

        if ($this->form_validation->run() == FALSE) {
            $this->form($id);
        } else {
            $path = './web/uploads/productos/';

            $config['upload_path'] = $path;
            $config['overwrite'] = TRUE;
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 2044;
            $this->load->library('upload');

            $upload_count = 0;

            /* IMAGEN 1 */

            $files = $_FILES;
            $cpt = count($_FILES['producto']['name']);

            for($i=1; $i<$cpt; $i++){

                $_FILES['producto']['name']= $files['producto']['name']['imagen_'.$i];
                $_FILES['producto']['type']= $files['producto']['type']['imagen_'.$i];
                $_FILES['producto']['tmp_name']= $files['producto']['tmp_name']['imagen_'.$i];
                $_FILES['producto']['error']= $files['producto']['error']['imagen_'.$i];
                $_FILES['producto']['size']= $files['producto']['size']['imagen_'.$i];  
                $img_name = $id != FALSE ? $id . '-imagen_'.$i : 'id-imagen_'.$i;
                $config['file_name'] = $img_name;
                $this->upload->initialize($config);
                    if (!$this->upload->do_upload('producto')) {
                        
                        if ($id == FALSE) {
                            $this->form($id, array(
                                'error_name' => 'imagen_'.($i).'_error',
                                'msg' => $this->upload->display_errors('<p class="help is-danger">', '</p>')
                            ));
                        } else {
                            if (trim($_FILES['producto']['name']) or $producto->imagen_1 or $producto->imagen_2 or $producto->imagen_3 or $producto->imagen_4 or $producto->imagen_5  or $producto->imagen_6) {
                                if ( $i == 1 ){
                                    $this->producto_model->set('imagen_1', $producto->imagen_1);
                                }
                                if ( $i == 3 ){
                                    $this->producto_model->set('imagen_3', $producto->imagen_3);
                                }
                                if ( $i == 4 ){
                                    $this->producto_model->set('imagen_4', $producto->imagen_4);
                                }
                                if ( $i == 5 ){
                                    $this->producto_model->set('imagen_5', $producto->imagen_5);
                                }
                                if ( $i == 6 ){
                                    $this->producto_model->set('imagen_6', $producto->imagen_6);
                                }

                                $upload_count++;
                            }
                        }
                    } else {

                        $upload_count++;
                        ${'$image_'.($i).'_ext'} = $this->upload->data('file_ext');
                        $this->producto_model->set('imagen_'.$i, $this->upload->data('file_name'));
                    }
                    if($i==1){
                        $i++;
                    }
            }
            $img_name = $id != FALSE ? $id . '-ficha' : 'id-ficha';
            $config['file_name'] = $img_name;
            $config['allowed_types'] = 'pdf';
            $this->upload->initialize($config);
            if ($upload_count == 2)
                if (!$this->upload->do_upload('ficha')) {
                    if ($this->upload->display_errors('<p>', '</p>') != '<p>No seleccionaste un archivo para subir.</p>') {
                        $this->form($id, array(
                            'error_name' => 'ficha_error',
                            'msg' => $this->upload->display_errors('<p class="help is-danger">', '</p>')
                        ));
                    } else {
                        if ($id == FALSE)
                            $this->producto_model->set('ficha', '');
                        else
                            $this->producto_model->set('ficha', $producto->ficha);
                    }
                } else {
                    $upload_count++;
                    $this->producto_model->set('ficha', $this->upload->data('file_name'));
                    $data=$this->upload->data();
                }

            if (${'$image_1_ext'} or $portada) {

                $this->producto_model->setByArray($this->input->post('producto'));
                $this->producto_model->set('slug', url_title($this->producto_model->get('nombre')));
                if ($id == FALSE) {
                    $id = $this->producto_model->insert();

                    $datos = json_decode($this->input->post('producto_datos'));
                    foreach ($datos as $dato) {
                        $this->producto_dato_model->set('producto_id', $id);
                        $this->producto_dato_model->set('dato', $dato->titulo);
                        $this->producto_dato_model->set('valor', $dato->valor);
                        $this->producto_dato_model->set('orden', 0);
                        $this->producto_dato_model->insert();
                    }
                    $update = array('imagen_1' => $id . '-imagen_1' . ${'$image_1_ext'}, 'imagen_2' => $id . '-imagen_2' . ${'$image_1_ext'}, 'ficha' => $id . '-ficha.pdf');
                    rename($path . 'id-imagen_1' . ${'$image_1_ext'}, $path . $id . '-imagen_1' . ${'$image_1_ext'});
                    //rename($path . 'id-imagen_2' . ${'$image_1_ext'}, $path . $id . '-imagen_2' . ${'$image_1_ext'});
                    if ($producto->imagen_3){
                        rename($path . 'id-imagen_3' . ${'$image_3_ext'}, $path . $id . '-imagen_3' . ${'$image_3_ext'});
                        $update[]=array('imagen_3' => $id . '-imagen_3' . ${'$image_3_ext'});
                    }
                    if ($producto->imagen_4){
                        rename($path . 'id-imagen_4' . ${'$image_4_ext'}, $path . $id . '-imagen_4' . ${'$image_4_ext'});
                        $update[]=array('imagen_4' => $id . '-imagen_4' . ${'$image_4_ext'});
                    }
                    if ($producto->imagen_5){
                        rename($path . 'id-imagen_5' . ${'$image_5_ext'}, $path . $id . '-imagen_5' . ${'$image_5_ext'});
                        $update[]=array('imagen_5' => $id . '-imagen_5' . ${'$image_5_ext'});
                    }
                    if ($producto->imagen_6){
                        rename($path . 'id-imagen_6' . ${'$image_6_ext'}, $path . $id . '-imagen_6' . ${'$image_6_ext'});
                        $update[]=array('imagen_6' => $id . '-imagen_6' . ${'$image_6_ext'});
                    }
                    rename($path . 'id-ficha.pdf', $path . $id . '-ficha.pdf');

                    $this->db->where('id', $id);
                    $this->db->update('producto', $update);
                } else {

                    $this->producto_model->update();

                    $this->db->where('producto_id', $id);
                    $this->db->delete('producto_dato');
                    $datos = json_decode($this->input->post('producto_datos'));
                    foreach ($datos as $dato) {
                        $this->producto_dato_model->set('producto_id', $id);
                        $this->producto_dato_model->set('dato', $dato->titulo);
                        $this->producto_dato_model->set('valor', $dato->valor);
                        $this->producto_dato_model->set('orden', 0);
                        $this->producto_dato_model->insert();
                    }
                }

                redirect('producto');
            }

        }
    }

    public function delete($id)
    {
        $producto = $this->producto_model->findByPk($id);

        $path = './web/uploads/productos/';
        if (file_exists($path . $producto->imagen_1)) {
            unlink($path . $producto->imagen_1);
        }

        if (file_exists($path . $producto->imagen_2)) {
            unlink($path . $producto->imagen_2);
        }

        $this->producto_model->set('id', $id);
        $this->producto_model->delete();
        redirect('producto');
    }
}
