<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Log;
use Src\Payment\Domain\Entities\Payment;

class ProcessPixPaymentJob implements ShouldQueue
{
    use Queueable;

    private Payment $payment;

    /**
     * Create a new job instance.
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Processing pix payment: {$this->payment->id}");
    }
}
