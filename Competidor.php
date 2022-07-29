<?php 

class Competidor
{
    private $id = 0;
    private $name = null;
    private $descricao = null;
    private $points = null;

    public function setId(int $id) :void
    {
        $this->id = $id;
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function setName(string $name) :void
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setDescricao(string $descricao) :void
    {
        $this->descricao = $descricao;
    }

    public function getDescricao() :string
    {
        return $this->descricao;
    }

    public function setPoints(int $points) :void
    {
        $this->points = $points;
    }

    public function getPoints() :int
    {
        return $this->points;
    }

    private function connection()
    {
        return new \PDO("pgsql:host=kesavan.db.elephantsql.com;port=5432;dbname=gdxjmuix", "gdxjmuix", "T0FVQa03cabOxs_S3oyzG00FwpEHlO97");
    }

    public function readByName() :array
    {
        $con = $this->connection();
        if ($this->getName() !== null)
        {
            $stmt = $con->prepare("SELECT * FROM wp_competidores WHERE name LIKE :_name ORDER BY name");
            if ($stmt->execute([':_name' => '%'.$this->getName().'%']))
            {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
        else if ($this->getId() === 0)
        {
            $stmt = $con->prepare("SELECT * FROM wp_competidores ORDER BY name");
            if ($stmt->execute())
            {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
        else if ($this->getId() > 0)
        {
            $stmt = $con->prepare("SELECT * FROM wp_competidores WHERE id = :_id");
            $stmt->bindValue("_id", $this->getId(), \PDO::PARAM_INT);
            if ($stmt->execute())
            {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
        }

        return [];
    }

    public function readByPoints() :array
    {
        $con = $this->connection();
        $stmt = $con->prepare("SELECT * FROM wp_competidores ORDER BY points DESC");
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        return [];
    }

    public function create() :array
    {
        $con = $this->connection();
        $stmt = $con->prepare("INSERT INTO wp_competidores VALUES (DEFAULT, :_name, :_descricao, :_points)");
        $stmt->bindValue("_name", $this->getName(), \PDO::PARAM_STR);
        $stmt->bindValue("_descricao", $this->getDescricao(), \PDO::PARAM_STR);
        $stmt->bindValue("_points", random_int(1,100), \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            $this->setId($con->lastInsertId());
            return $this->readByName();
        }
        else
        {
            return $stmt->errorInfo();
        }
    }

    public function delete() :array
    {
        $competidor = $this->readByName();
        $con = $this->connection();
        $stmt = $con->prepare("DELETE FROM wp_competidores WHERE id = :_id");
        $stmt->bindValue("_id", $this->getId(), \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return $competidor;
        }
        return [];
    }

    public function update() :array
    {
        $con = $this->connection();
        $stmt = $con->prepare("UPDATE wp_competidores SET name = :_name, descricao = :_descricao WHERE id = :_id");
        $stmt->bindValue("_name", $this->getName(), \PDO::PARAM_STR);
        $stmt->bindValue("_descricao", $this->getDescricao(), \PDO::PARAM_STR);
        $stmt->bindValue("_id", $this->getId(), \PDO::PARAM_INT);
        if ($stmt->execute())
        {
            return $this->readByName();
        }
        return [];
    }

}

?>