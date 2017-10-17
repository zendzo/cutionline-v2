<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CutiApproveMailNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $name = $this->data->user->fullName();

        $startDate = $this->data->mulai->format('d-m-Y');

        $endDate = $this->data->berakhir->format('d-m-Y');

        $content = "Sdr. ".$name." pengajuan cuti anda untuk ".$startDate." telah disetujui, dan berakhir pada ".$endDate;

        return (new MailMessage)
                    ->greeting('Cuti Disetujui.')
                    ->line($content)
                    ->action('Buka Link Untuk Detail', url('/user/cuti',$this->data->id))
                    ->line('Terimakasi Telah Menggunakan '.config('APP_NAME'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
