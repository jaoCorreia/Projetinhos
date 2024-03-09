<?php

class Console{

    private ?string $id;
    private ?string $nome; 
    private ?string $fabricante; 



    public function __toString(){
        $retorno = $this->nome;
        if($this->fabricante)
            $retorno = $retorno . "(" . $this->fabricante . ")";
   
        return $retorno;
    }



    /**
     * Get the value of id
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of fabricante
     */
    public function getFabricante(): ?string
    {
        return $this->fabricante;
    }

    /**
     * Set the value of fabricante
     */
    public function setFabricante(?string $fabricante): self
    {
        $this->fabricante = $fabricante;

        return $this;
    }
}


?>