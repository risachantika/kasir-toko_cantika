<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'nama'=>'Administrator',
            'username'=>'admin',
            'role'=>'admin',
            'password'=> bcrypt('password'),
        ]);

        \App\Models\User::create([
            'nama'=>'Petugas',
            'username'=>'petugas',
            'role'=>'petugas',
            'password'=> bcrypt('password'),
        ]);

        
        \App\Models\Pelanggan::create([
            'nama'=>'Cantika Monarisa',
            'alamat'=>'Padaherang',
            'nomor_tlp'=>'082288877766',
        ]);

        \App\Models\Pelanggan::create([
            'nama'=>'Sahwa Wulan',
            'alamat'=>'Maruyungsari',
            'nomor_tlp'=>'085456675345',
        ]);

        \App\Models\Kategori::create([
            'nama_kategori'=>'Makanan',
        ]);

        \App\Models\Kategori::create([
            'nama_kategori'=>'Minuman',
        ]);

        \App\Models\Produk::create([
            'kategori_id'=>'1',
            'kode_produk'=>'1001',
            'nama_produk'=>'Indomie',
            'harga'=>'3000'
        ]);
        
        \App\Models\Produk::create([
            'kategori_id'=>'2',
            'kode_produk'=>'1002',
            'nama_produk'=>'Teh Kotak',
            'harga'=>'5000'
        ]);

        \App\Models\Stok::create([
            'produk_id'=>'1',
            'nama_suplier'=>'PT Indofood',
            'jumlah'=>'250',
            'tanggal'=> date('Y-m-d', strtotime('-1 week'))
        ]);

        \App\Models\Stok::create([
            'produk_id'=>'2',
            'nama_suplier'=>'Toko Haji Dadang',
            'jumlah'=>'100',
            'tanggal'=> date('Y-m-d', strtotime('-1 week'))
        ]);
        
        \App\Models\Produk::where('id',1)->update([
            'stok'=>'250',
        ]);
        
        \App\Models\Produk::where('id',2)->update([
            'stok'=>'100',
        ]);

        \App\Models\Penjualan::create([
            'user_id'=> 1,
            'pelanggan_id'=> 1,
            'nomor_transaksi'=> date('Ymd') . '0001',
            'tanggal'=> date('Y-m-d H:i:s'),
            'subtotal'=> 8000,
            'pajak'=> 800,
            'total'=> 8800,
            'tunai'=> 10000,
            'kembalian'=> 1200
        ]);

        \App\Models\Penjualan::create([
            'user_id'=> 2,
            'pelanggan_id'=> 2,
            'nomor_transaksi'=> date('Ymd') . '0002',
            'tanggal'=> date('Y-m-d H:i:s'),
            'subtotal'=> 11000,
            'pajak'=> 1100,
            'total'=> 12100,
            'tunai'=> 15000,
            'kembalian'=> 2900
        ]);

        \App\Models\DetailPenjualan::create([
            'penjualan_id'=> 1,
            'produk_id'=> 1,
            'jumlah'=> 1,
            'harga_produk'=> 3000,
            'subtotal'=> 3000,
        ]);

        \App\Models\DetailPenjualan::create([
            'penjualan_id'=> 1,
            'produk_id'=> 2,
            'jumlah'=> 1,
            'harga_produk'=> 5000,
            'subtotal'=> 5000,
        ]);

        \App\Models\DetailPenjualan::create([
            'penjualan_id'=> 2,
            'produk_id'=> 1,
            'jumlah'=> 2,
            'harga_produk'=> 3000,
            'subtotal'=> 6000,
        ]);
        
        \App\Models\DetailPenjualan::create([
            'penjualan_id'=> 2,
            'produk_id'=> 2,
            'jumlah'=> 1,
            'harga_produk'=> 5000,
            'subtotal'=> 5000,
        ]);



       


    }
}
