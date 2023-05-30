<!--?php
if (isset($_POST['email']) && isset($_POST['mdp'])) {
    foreach ($users as $user) {
        if (
                $user['email'] === $_POST['email'] &&
                $user['mdp'] === $_POST['mdp']
            ) {
                $loggedUser = ['email' => $user['email'],
            ];
            } else {
            $errorMessage = sprintf('les informations envoyés ne permettent pas de vous identifier :',
                        $_POST['email'],
                        $_POST['password']
        );
    }
    }
}
?-->