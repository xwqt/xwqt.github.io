<?php
// Przyjmowanie zapytań POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Odczytaj dane z zapytania POST
    $domain = $_POST['domain'];

    // Przykładowa logika weryfikacji
    $authorized = verifyDomain($domain);

    // Tworzenie odpowiedzi JSON
    $response = [
        'authorized' => $authorized ? 'true' : 'false'
    ];

    // Ustawienie nagłówka Content-Type na application/json
    header('Content-Type: application/json');

    // Wysłanie odpowiedzi JSON
    echo json_encode($response);
} else {
    // Obsługa innych typów żądań (np. GET)
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
}

// Funkcja weryfikacji domeny (przykład)
function verifyDomain($domain) {
    // Tutaj można umieścić logikę weryfikacji domeny, na przykład sprawdzenie w bazie danych
    // Zwróć true, jeśli domena jest autoryzowana, lub false w przeciwnym razie
    // W tym przykładzie, zwracamy true, jeśli nazwa domeny jest "example.com"
    return ($domain === 'ultimaroleplay.000.pe');
}
?>
