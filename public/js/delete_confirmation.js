const deleteForms = document.querySelectorAll(".delete-form");
deleteForms.forEach(deleteForm => {
    // const title = form.getAttribute('data-title');
    const title = deleteForm.dataset.title;
    deleteForm.addEventListener("submit", function(e) {
        e.preventDefault();
        const conf = confirm(`Do you want to delete ${title}?`);
        if (conf) this.submit();
    });
});
