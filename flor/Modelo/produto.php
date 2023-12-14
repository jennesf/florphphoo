<?php

class Produto {
    private string $id;  
      
    private string $imagem;    
    private string $nome;    
    private float $preco;
    
    public function __construct(?int $id,
                             
                                string $nome, 
                                float $preco)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
    }

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
    

    /** Get the value of imagem
    */
   public function getImagem(): string
   {
       return $this->imagem;
   }
   public function getImagemDiretorio(): string
    {
        return "../img/".$this->imagem;
    }

   /**
    * Set the value of imagem
    */
    public function setImagem(string $imagem): void
    {
        $this->imagem = $imagem;

       
    }
   /** Get the value of nome
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }


   /**
    * Get the value of preco
    */
   public function getPreco(): float
   {
       return $this->preco;
   }

   /**
    * Set the value of preco
    */
   public function setPreco(float $preco): self
   {
       $this->preco = $preco;

       return $this;
   }

}
?>
   