<?php

namespace App\Observers;

use App\Models\HistoriqueActivite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class GenericObserver
{
    public function created(Model $model): void
    {
        $this->log('created', $model);
    }

    public function updated(Model $model): void
    {
        $this->log('updated', $model);
    }

    public function deleted(Model $model): void
    {
        $this->log('deleted', $model);
    }

    private function log(string $action, Model $model): void
    {
        HistoriqueActivite::create([
            'user_id' => Auth::id(),
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'data' => $model->toArray(),
        ]);
    }
}
