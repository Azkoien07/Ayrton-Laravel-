<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Carbon\Carbon;

class TaskReminderNotification extends Notification
{
    use Queueable;

    protected $task;

    public function __construct($task)
    {
        $this->task = $task;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Recordatorio de Tarea')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Tienes un recordatorio de la tarea: ' . $this->task->name)
            ->line('Descripción: ' . $this->task->description)
            ->line('Fecha de vencimiento: ' . Carbon::parse($this->task->f_expiration)->format('d/m/Y H:i'))
            ->action('Ver Tarea', url('/tasks/' . $this->task->id))
            ->line('¡No olvides completar tu tarea!');
    }
}
