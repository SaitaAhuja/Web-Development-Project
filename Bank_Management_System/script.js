// Confirm before deleting
function confirmDelete(){
    return confirm("Are you sure you want to delete this account?");
}

// Validate deposit/withdraw amount
function validateAmount(){
    let amt = document.querySelector('input[name="amount"]').value;
    if(amt <= 0){
        alert("Enter a valid amount!");
        return false;
    }
    return true;
}

// Help Desk FAQ toggle
const buttons = document.querySelectorAll(".faq-btn");

buttons.forEach(btn => {
    btn.addEventListener("click", () => {
        const answer = btn.nextElementSibling;
        if(answer.style.display === "block") {
            answer.style.display = "none";
        } else {
            answer.style.display = "block";
        }
    });
});

