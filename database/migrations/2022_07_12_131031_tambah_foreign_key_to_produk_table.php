<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->unsignedInteger('id_kategori')->change(); // 
            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('kategori')     // mendeklarasikan id_kategori yang ada pada tabel produk menjadi foreignkey yang di ambil dari idkategori pada tabel kategori yang merupakan primarykey
                  ->onUpdate('restrict') // ketika tabel kategorinya di hapus sedangkan telah berelasi dengan tabel produk maka tabel kategori tidak dapat dihapus
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->integer('id_kategori')->change(); // wajib code ini biar datanya konsisten
            $table->dropForeign('produk_id_kategori_foreign')->change();  //dropForeign('NAMATABEL_NAMACOLUMN_TIPECOLUMN')
        });
    }
};
