<?php
class ProdutoRepositorio
{
    private $conn; 
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function cadastrar(Produto $produto)
    {
        $sql = "INSERT INTO produtos (nome, imagem, preco) 
        VALUES (?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "ssd",
            $produto->getNome(),
            $produto->getImagemDiretorio(),
            $produto->getPreco()
);

    $success = $stmt->execute();

    $stmt->close();

    return $success;
    }
    

    
    public function atualizarProduto(Produto $produto)
    {
        $imagem = $produto->getImagem();
        if (empty($imagem)) {
            // Prepara a declaração SQL
            $sql = "UPDATE produtos SET tipo = ?, nome = ?,
            descricao = ?,  preco = ? WHERE id = ?";
            $stmt = $this->conn->prepare($sql);

            // Extrai os atributos do objeto Produto
            $tipo = $produto->getTipo();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();

            $preco = $produto->getPreco();
            $id = $produto->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'sssdi',
                $tipo,
                $nome,
                $descricao,

                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        } else {
            // Prepara a declaração SQL
            $sql = "UPDATE produtos SET tipo = ?, nome = ?,
            descricao = ?, imagem = ?, preco = ? WHERE id = ?";

            $stmt = $this->conn->prepare($sql);
            // Extrai os atributos do objeto Produto
            $tipo = $produto->getTipo();
            $nome = $produto->getNome();
            $descricao = $produto->getDescricao();
            $imagem = $produto->getImagemDiretorio();
            $preco = $produto->getPreco();
            $id = $produto->getId();

            // Vincula os parâmetros
            $stmt->bind_param(
                'ssssdi',
                $tipo,
                $nome,
                $descricao,
                $imagem,
                $preco,
                $id
            );
            // Executa a declaração preparada
            $resultado = $stmt->execute();

            // Fecha a declaração
            $stmt->close();

            return $resultado;
        }
    }

    public function listarFloresPorId($id)
    {
        $sql = "SELECT * FROM produtos WHERE tipo = 'flor' 
            AND id = ? ORDER BY preco LIMIT 1";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('i', $id);
    
        $stmt->execute();

        $result = $stmt->get_result();

        $produto = null;

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $produto = new Produto(
                $row['id'],
                $row['tipo'],
                $row['nome'],
                $row['preco'],
                $row['imagem']
                
            );
        }

        // Fecha a declaração
        $stmt->close();

        return $produto;
    }
    

    public function excluirProdutoPorId($id)
    {
        $sql = "DELETE FROM produtos WHERE  
             id = ?";

        // Prepara a declaração SQL
        $stmt = $this->conn->prepare($sql);

        // Vincula o parâmetro
        $stmt->bind_param('i', $id);

        // Executa a consulta preparada
        $success = $stmt->execute();

        // Fecha a declaração
        $stmt->close();

        return $success;
    }


    public function listarFlores()
    {
        $sql = "SELECT * FROM produtos where tipo = 'flor' 
        ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
                    $row['tipo'],
                    $row['nome'],
                    $row['preco'],
                    $row['imagem']
                    
                );
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }

    public function buscarTodos()
    {
        $sql = "SELECT * FROM produtos ORDER BY preco";
        $result = $this->conn->query($sql);

        $produtos = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $produto = new Produto(
                    $row['id'],
                    $row['tipo'],
                    $row['nome'],
                    $row['preco'],
                    $row['imagem']
                    
                );
                $produtos[] = $produto;
            }
        }

        return $produtos;
    }
}