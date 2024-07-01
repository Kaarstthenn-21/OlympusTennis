<?php

namespace App\Jobs;

use App\Models\Clase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessClase implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $clase;
    protected $categoria;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Clase $clase, $categoria)
    {
        $this->clase = $clase;
        $this->categoria = $categoria;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Lógica para procesar la clase
        // Por ejemplo, actualizar un campo, enviar una notificación, etc.
        $this->clase->procesada = true;
        $this->clase->categoria_procesada = $this->categoria;
        $this->clase->save();
    }
}


