<?php

include_once 'models/alumno.php';

class ConsultaModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function  get()
    {
        $items = [];

        try {

            $query = $this->db->connect()->query('SELECT * FROM alumnos');
            while ($row = $query->fetch()) {

                $item = new Alumno();

                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];

                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    function getById($id)
    {
        $item = new Alumno();
        $query = $this->db->connect()->prepare('SELECT * FROM alumnos WHERE matricula=:matricula');
        try {
            $query->execute(['matricula' => $id]);

            while ($row = $query->fetch()) {
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
            }
            return $item;
        } catch (PDOException $e) {

            return null;
        }
    }

    function update($alumno)
    {
        try {
            $query = $this->db->connect()->prepare('UPDATE alumnos SET nombre=:nombre , apellido=:apellido WHERE matricula = :matricula');
            $query->execute(['nombre' => $alumno['nombre'], 'apellido' => $alumno['apellido'], 'matricula' => $alumno['matricula']]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    function delete($matricula)
    {
        try {
            $query = $this->db->connect()->prepare('DELETE FROM alumnos WHERE matricula = :matricula');
            $query->execute(['matricula' => $matricula]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
