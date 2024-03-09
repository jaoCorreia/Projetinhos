<?php

include_once(__DIR__."/Etario.php");
include_once(__DIR__."/Console.php");
include_once(__DIR__."/Genero.php");

class Jogo{


    private ?int $id;

    private ?string $nome; 

    private ?string $ano;

    private ?float $preco;
    

    private ?Console $console;

    private ?Etario $etario;

    private ?Genero $genero;

    public function __construct()
    {
        $this->id=0;
        $this ->console = null;
        $this ->etario = null;
        $this ->genero = null;
    }

    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
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
     * Get the value of console
     */
    public function getConsole(): ?Console
    {
        return $this->console;
    }

    /**
     * Set the value of console
     */
    public function setConsole(?Console $console): self
    {
        $this->console = $console;

        return $this;
    }

    /**
     * Get the value of etario
     */
    public function getEtario(): ?Etario
    {
        return $this->etario;
    }

    /**
     * Set the value of etario
     */
    public function setEtario(?Etario $etario): self
    {
        $this->etario = $etario;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero(): ?Genero
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero(?Genero $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of ano
     */
    public function getAno(): ?string
    {
        return $this->ano;
    }

    /**
     * Set the value of ano
     */
    public function setAno(?string $ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of preco
     */
    public function getPreco(): ?float
    {
        return $this->preco;
    }

    /**
     * Set the value of preco
     */
    public function setPreco(?float $preco): self
    {
        $this->preco = $preco;

        return $this;
    }
}




?>