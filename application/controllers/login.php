
<?php  
public function login(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $res = $this->Usuarios_models->login($username, sha1($password));

        if (!$res) 
        {
            $this->session->set_flashdata("Error","El usuario y/o contraseña son incorrectos");
            redirect(base_url());
        }
        else{
            $data  = array(
                'id' => $res->id_usuario, 
                'nombre' => $res->nombre_usuario,
                'rol' => $res->rol_id_usuario,
                'login' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url()."dashboard");
        }
    }
?>