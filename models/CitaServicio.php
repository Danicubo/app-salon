<?php
namespace Models;
use Model\ActiveRecord;

class CitaServicio extends ActiveRecord {
    protected static $table = 'citas_servicios';
    protected static $columnasDB = ['id', 'cita_id', 'servicio_id'];

    public $id;
    public $cita_id;
    public $servicio_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->cita_id = $args['cita_id'] ?? '';
        $this->servicio_id = $args['servicio_id'] ?? '';
    }

}