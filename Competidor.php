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
            $stmt = $con->prepare("SELECT * FROM competidores WHERE name LIKE :_name ORDER BY name");
            if ($stmt->execute([':_name' => '%'.$this->getName().'%']))
            {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
        else if ($this->getId() === 0)
        {
            $stmt = $con->prepare("SELECT * FROM competidores ORDER BY name");
            if ($stmt->execute())
            {
                return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
        else if ($this->getId() > 0)
        {
            $stmt = $con->prepare("SELECT * FROM competidores WHERE id = :_id");
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
        $stmt = $con->prepare("SELECT * FROM competidores ORDER BY points DESC");
        if ($stmt->execute())
        {
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        return [];
    }

}

?>