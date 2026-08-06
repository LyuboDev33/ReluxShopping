<?php

namespace App\Mail;

use App\Models\Admin\Promocode;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Order $order,
        public Collection $orderProducts,
        public ?Promocode $promoCode

    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(
                'contact@reluxtop.com',
                'Relux Top Shopping - Потвърждение за поръчка'
            ),
            subject:
                'Потвърждение на поръчка #' .
                $this->order->order_number,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.order-created',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
