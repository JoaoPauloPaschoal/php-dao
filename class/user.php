<?php

class user 
{
    private $idUsuario;
    private $desLogin;
    private $desSenha;
    private $dtCadastro;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($value)
    {
        $this->idUsuario=$value;
    }
    public function getDesLogin()
    {
        return $this->desLogin;
    }
    public function setDesLogin()
    {
        return $this->desLogin;
    }
    public function getDesSenha()
    {
        return $this->desSenha;
    }
    public function setDesSenha()
    {
        return $this->desSenha;
    }
    public function getDtCadastro()
    {
        return $this->dtCadastro;
    }
    public function setDtCadastro()
    {
        return $this->dtCadastro;
    }
    public function loadById($id)
    {
        $sql=new sql();

        $results=$sql->select("SELECT * FROM tb_usuarios WHERE idUsuario=:ID", array(
            ":ID"=>$id
        ));
        if (count($results) > 0)
        {
            $row = $results[0];

            $this->setIdUsuario($row['idUsuario']);
            $this->setDesLogin($row['desLogin']);
            $this->setDesSenha($row['desSenha']);
            $this->setDtCadastro(new DateTime($row['dtCadastro']));
        }    
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdUsuario(),
            "deslogin"=>$this->getDesLogin(),
            "dessenha"=>$this->getDesSenha(),
            "dtcadastro"=>$this->getDtCadastro()#->format("d/m/Y H:i:s")
        ));
    }
}

?>