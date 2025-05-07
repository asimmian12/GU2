<?php
include '../../config/config.php';
include '../../includes/header.php';

$errors = [];
$name = $email = $message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    // Validate inputs
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($message)) $errors[] = "Message is required.";

    if (empty($errors)) {
        $_SESSION['status_message'] = "Your message has been received successfully!";
        $_SESSION['submitted_data'] = [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'message' => htmlspecialchars($message)
        ];
        header('Location: contact.php');
        exit();
    }
}
?>
<h1 class="h1-heading-center">Contact Us</h1>

<section class="section-login-form">
    <form action="" method="post" class="form-login-form">
        <label for="name">Name:</label>
        <input type="text" class="section-login-form" id="name" name="name" placeholder="Enter Your Name" value="<?php echo htmlspecialchars($name); ?>">

        <label for="email">Email:</label>
        <input type="email" class="section-login-form" id="email" name="email" placeholder="Enter Your Email" value="<?php echo htmlspecialchars($email); ?>">

        <label for="message">Message:</label>
        <textarea id="message" class="section-login-form" name="message" placeholder="Enter Your Message"><?php echo htmlspecialchars($message); ?></textarea>

        <input type="submit" class="input-login-btn" value="Submit">

        <?php if (!empty($errors)): ?>
            <div class="status-message" style="color: red;">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php elseif (!empty($_SESSION['status_message'])): ?>
            <div class="status-message" style="color: green;">
                <?php 
                echo htmlspecialchars($_SESSION['status_message']); 
                if (!empty($_SESSION['submitted_data'])) {
                    echo "<p>Name: " . $_SESSION['submitted_data']['name'] . "</p>";
                    echo "<p>Email: " . $_SESSION['submitted_data']['email'] . "</p>";
                    echo "<p>Message: " . ($_SESSION['submitted_data']['message']) . "</p>";
                }
                unset($_SESSION['status_message'], $_SESSION['submitted_data']);
                ?>
            </div>
        <?php endif; ?>
    </form>
</section>

<?php include '../../includes/footer.php'; ?>
