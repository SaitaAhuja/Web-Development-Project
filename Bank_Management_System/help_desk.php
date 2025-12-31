<link rel="stylesheet" href="style.css">

<div class="container help-desk">
    <h2>Help Desk</h2>

    <button class="faq-btn">How to open an account?</button>
    <div class="faq-answer">Visit the bank or contact admin to create a new account.</div>

    <button class="faq-btn">How to deposit money?</button>
    <div class="faq-answer">Login to ATM Services and select Deposit.</div>

    <button class="faq-btn">How to withdraw money?</button>
    <div class="faq-answer">Login to ATM Services and select Withdraw.</div>

    <button class="faq-btn">How to transfer money?</button>
    <div class="faq-answer">Login to ATM Services, select Transfer, and enter the receiver account number.</div>

    <button class="faq-btn">How to check balance?</button>
    <div class="faq-answer">Login to ATM Services and select Check Balance.</div>
   
    <div class="back-link">
    <a href="dashboard.php" class="plain-link">⬅ Back to Dashboard</a>
</div>

</div>

<!-- ====== JS for FAQ toggle ====== -->
<script>
const faqBtns = document.querySelectorAll('.faq-btn');
faqBtns.forEach(btn => {
    btn.addEventListener('click', () => {
        btn.classList.toggle('active'); // toggle active class
    });
});
</script>

