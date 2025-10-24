$(document).ready(() => {
    // Ambil konten dari elemen dengan id "app"
    const app = $('#app').html();

    // Ganti konten dari section dengan class "container mt-8" dengan konten app
    $('section.container.mt-8').html(app);

    // Ambil nama perpustakaan dari header
    const library_subname = document.querySelector('header nav h2').textContent;
    const library_name = document.querySelector('header nav h1').textContent;

    // Ubah title halaman dengan nama perpustakaan
    document.title = `${library_subname} | ${library_name}`;
});