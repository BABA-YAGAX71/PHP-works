<?php

// Define the Notifier interface
interface Notifier {
    public function sendNotification(string $message, string $recipient);
}

// Implement the EmailNotifier class
class EmailNotifier implements Notifier {
    public function sendNotification(string $message, string $recipient) {
        echo "Sending Email to $recipient: $message\n";
    }
}

// Implement the SMSNotifier class
class SMSNotifier implements Notifier {
    public function sendNotification(string $message, string $recipient) {
        echo "Sending SMS to $recipient: $message\n";
    }
}

// Implement the PushNotifier class
class PushNotifier implements Notifier {
    public function sendNotification(string $message, string $recipient) {
        echo "Sending Push Notification to $recipient: $message\n";
    }
}

// Example usage
$notifiers = [
    new EmailNotifier(),
    new SMSNotifier(),
    new PushNotifier()
];

foreach ($notifiers as $notifier) {
    $notifier->sendNotification("Hello, this is a test notification.", "user@example.com");
}
?>
