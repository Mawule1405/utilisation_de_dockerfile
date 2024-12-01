<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db-config.php';

function getEtudiants(PDO $PDO) {
    $sql = "SELECT * FROM etudiants";
    $result = $PDO->query($sql);
    $etudiants = $result->fetchAll(PDO::FETCH_ASSOC);
    $result->closeCursor();
    return $etudiants;
}

try {
    $PDO = new PDO(DB_DSN, DB_USER, DB_PASS, $options);
    $etudiants = getEtudiants($PDO);
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire des Étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }
        .card-header {
            background-color: #3498db;
            color: white;
        }
        .table-custom {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .table-custom thead {
            background-color: #2980b9;
            color: white;
        }
        .table-custom th {
            font-weight: 600;
            text-transform: uppercase;
        }
        .table-custom tr:nth-child(even) {
            background-color: #f2f4f6;
        }
        .table-custom tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }
        .empty-state {
            text-align: center;
            padding: 50px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card card-custom mb-4">
            <div class="card-header">
                <h2 class="mb-0 text-center">
                    <i class="bi bi-people-fill me-2"></i>Annuaire des Étudiants
                </h2>
            </div>
            <div class="card-body p-0">
                <?php if (!empty($etudiants)): ?>
                    <div class="table-responsive">
                        <table class="table table-custom mb-0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Spécialisation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($etudiants as $etudiant): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($etudiant['nom']) ?></td>
                                        <td><?= htmlspecialchars($etudiant['prenom']) ?></td>
                                        <td><?= htmlspecialchars($etudiant['specialisation']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <h3>🎓 Aucun étudiant trouvé</h3>
                        <p class="text-muted">La base de données est actuellement vide.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>