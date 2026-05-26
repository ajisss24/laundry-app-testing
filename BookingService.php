<?php

class BookingService {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function validatePayment($booking_id) {

        $stmt = $this->pdo->prepare(
            "UPDATE bookings SET payment_status = 'Paid' WHERE id = ?"
        );

        return $stmt->execute([$booking_id]);
    }
}
