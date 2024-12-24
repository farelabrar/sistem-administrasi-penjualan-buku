<script type="text/javascript">
    <?php echo $jsArray; ?>
    
    function changeValue(id_buku) {
        if(id_buku != "") {
            document.getElementById('pengarang').value = dataBuku[id_buku].pengarang;
            document.getElementById('nama_penerbit').value = dataBuku[id_buku].nama_penerbit;
            document.getElementById('harga').value = dataBuku[id_buku].harga;
            document.getElementById('id_buku').value = dataBuku[id_buku].id;
        } else {
            document.getElementById('pengarang').value = '';
            document.getElementById('nama_penerbit').value = '';
            document.getElementById('harga').value = '';
            document.getElementById('id_buku').value = '';
        }
    }
</script>