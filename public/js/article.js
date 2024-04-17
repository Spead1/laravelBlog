function showComments() {
    const slug = window.location.pathname.split("/").pop();
    const url = `/articles/${slug}/comments/count`;

    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error(
                    "Erreur lors de la récupération des commentaires"
                );
            }
            return response.json();
        })
        .then((data) => {
            const comment_count = data.comment_count;
            let commentsContainer =
                document.getElementById("comments-container");
            let showCommentsBtn = document.getElementById("show-comments-btn");

            if (
                commentsContainer.style.display === "none" ||
                commentsContainer.style.display === ""
            ) {
                commentsContainer.style.display = "block";
                showCommentsBtn.textContent = `Masquer ${comment_count} commentaires`;
            } else {
                commentsContainer.style.display = "none";
                showCommentsBtn.textContent = `Afficher ${comment_count} commentaires`;
            }
        })
        .catch((error) => {
            console.error("Erreur:", error);
        });
}
