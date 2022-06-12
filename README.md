<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center">
  <img align="center" src="https://github.com/Recycraft/.github/blob/main/assets/racycraft.jpg"  width="200"></img>
<br>
Recycraft
</h1>

#  Bangkit 2022 Product Based Capstone

### Team ID : C22-PS285

### Members : 
* (M2007F0776) - [Wahyu Adi Nugroho](https://github.com/wahyu-adi-n) - Universitas Dian Nuswantoro
* (M2007F0777) - [Raphael Adhimas Aryandanu Santoso](https://github.com/raphaeldanu) - Universitas Dian Nuswantoro
* (A2007F0724) - [Alfonda Steven Wahyudi](https://github.com/alfondasteven) - Universitas Dian Nuswantoro
* (A2009F0915) - [Firstiannisa Rizki](https://github.com/ftiannisa) - Universitas Gunadarma
* (C2009F0934) - [Zekri Fitra Ramadhan](https://github.com/yusrankun) - Universitas Gunadarma
* (C7009F0926) - [Muhammad Rafi Ramadhan](https://github.com/rafi016) - Universitas Gunadarma

# Recyraft-Back End
This project is our final project for Google Bangkit Academy 2022.

## How to Set Up
### Local
1. Make sure you have all the prerequisites. 
2. Clone this repository
3. Copy the .env.example file in the same folder and rename it to .env 
4. Set your database credentials in the .env file.  
  Before you set this up, make sure you have created database with the same name in your MySQL Engine.  
  Set all of this with your configuration.  
  ```
  DB_DATABASE=  
  DB_USERNAME=   
  DB_PASSWORD=  
  ```

5. Install the needed dependencies using composer
   ```bash
   composer install  
   ```
6. Generate new key for your application using cli (Terminal / CMD)  
   ```bash
   php artisan key:generate  
   ```
7. Run Migration and Seeder  
   ```bash
   php artisan migrate:fresh --seed
   ```
8. Run your virtual environment  
   ```bash
   php artisan serve  
   ```  
  After this you can access the application from http:/localhost:8000 and if you already finish, don't forget to close the virtual environment using ctrl+c or command+c.

## Endpoint and API Documentation
You can acces the endpoint form:  
https://recycraft-backend-api-aysiqsilbq-et.a.run.app/api  

### Register  
The register process will generate API token for the user and the user is already logged in.
- Url  
  `/register`  
- Method  
  POST  
- Request Body  
  * `name` as string  
  * `username` as string with alphanumeric characters and dash  
  * `email` as string and must be a valid email  
  * `password` as string and must be at least 8 characters  
- Response  
  ```json  
  {
    "message": "Registered Succesfully",
    "user": {
        "name": "User Testing",
        "username": "user_testing",
        "email": "testing@gmail.com",
        "updated_at": "2022-06-12T15:07:28.000000Z",
        "created_at": "2022-06-12T15:07:28.000000Z",
        "id": 13
    },
    "token": "114|U9IfDF1k7V0yYP9LCB1SVPjtsIZOxUTiwcVF1LUZ"
  }
  ```  

### Login  
The login process will generate API token for the user and return the user data as well as the api token.
- Url  
  `/login`  
- Method  
  POST  
- Request Body  
  * `email` as string and must be a valid email  
  * `password` as string and must be at least 8 characters  
- Response  
  ```json  
  {
    "user": {
        "id": 13,
        "name": "User Testing",
        "username": "user_testing",
        "email": "testing@gmail.com",
        "level": "user",
        "email_verified_at": null,
        "created_at": "2022-06-12T15:07:28.000000Z",
        "updated_at": "2022-06-12T15:07:28.000000Z",
        "deleted_at": null
    },
    "token": "115|iLA290QZa5xDtd7xcLJ2Ms5spOR89JGIORQg8TDI"
  }
  ```  

### Get User Profile  
The login process will return the user data.
- Url  
  `/user/profile`  
- Method  
  GET  
- Response  
  ```json  
  {
    "id": 13,
    "name": "User Testing",
    "username": "user_testing",
    "email": "testing@gmail.com",
    "level": "user",
    "email_verified_at": null,
    "created_at": "2022-06-12T15:07:28.000000Z",
    "updated_at": "2022-06-12T15:07:28.000000Z",
    "deleted_at": null
  }
  ```  

### Logout  
The logout process will destroy API token that used by the user.
- Url  
  `/logout`  
- Method  
  POST  
- Response  
  ```json  
  {
    "message": "Logged Out."
  }
  ```  

### Get All Scrap Categories
This will return all the scrap categories.  
- Url  
  `/category`  
- Method  
  GET  
- Response  
  ```json  
  {
    "data": [
        {
            "id": 1,
            "name": "Plastik",
            "slug": "plastic",
            "type": "recycleable",
            "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/scrap-categories/C284gvNc763qBqEFCHTC9DV4UfXvWdeCa1adktmX.jpg",
            "desc": "<p class=\"MsoNormal\">Plastik merupakan polimer; rantai panjang atom yang mengikat\r\nsatu sama lain. Rantai ini membentuk banyak unit molekul berulang, atau\r\n\"monomer\". Plastik umumnya terdiri dari polimer karbon saja atau\r\ndengan oksigen, nitrogen, chlorine atau belerang di tulang belakang. (beberapa\r\nminat komersial juga berdasar silikon). Apakah kalian tahu bahwa plastik ini memerlukan waktu 50 - 100 tahun untuk terurai ? Oleh karena itu, manfaatkan plastik ini dengan bijak ya. Ayo temukan berbagai ide kerajinan yang bisa dibuat dengan&nbsp; plastik ini !<p></p><p></p></p>\n"
        },
        {
            "id": 2,
            "name": "Kertas",
            "slug": "paper",
            "type": "recycleable",
            "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/scrap-categories/Z5zvp9JOf4eWwOD6F7PwzMPp8f9VePuxpDGj2Krw.jpg",
            "desc": "<p class=\"MsoNormal\">Kertas adalah bahan yang tipis yang dihasilkan dari kompresi\r\nserat yang berasal dari pulp. Serat yang digunakan biasanya adalah alami dan\r\nmengandung selulosa dan hemiselulosa. Kertas dikenal sebagai media utama untuk\r\nmenulis, mencetak serta melukis dan banyak kegunaan lain yang dapat dilakukan\r\ndengan kertas misalnya kertas pembersih (tissue) yang digunakan untuk hidangan,\r\nkebersihan ataupun keperluan toilet. Kertas ini akan terurai dalam waktu 2 &acirc;&#128;&#147; 5 bulan\r\nsaja sehingga kamu perlu memanfaatkan kertas dengan bijak ya. Kamu bisa membuat\r\nberbagai kerajina&nbsp; dari kertas di sini.<p></p></p>\n"
        },
        {
            "id": 3,
            "name": "Kardus",
            "slug": "cardboard",
            "type": "recycleable",
            "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/scrap-categories/sLUb6nYOOow5m0hHNsacyzQ029sIC4pzQfPnG8cR.jpg",
            "desc": "<p>Kardus adalah&nbsp; kemasan yang biasanya terbuat dari bahan kertas kraft yang dibuat menjadi bahan bergelombang dengan ketinggian dan ketebalan gelombang tertentu. Kardus sangat sering kita jumpai untuk pengemasan produk, selain itu digunakan untuk penyimpanan berbagai barang seperti mainan, pakaian, dan lain sebagainya. Kardus ini dapat terurai setelah kurang lebih 5 bulan. Oleh karena itu, kita harus bisa memanfaatkan kardus ini dan membuatnya&nbsp; menjadi berbagai kerajinan yang bernilai estetik atau fungsional.</p>\n"
        },  
        ...  
      ]
  }
  ```  

### Get All Scrap Categories with Handicraft  
This will return all the scrap categories all well as the handicrafts for each categories
- Url  
  `/category-with-handicrafts`  
- Method  
  GET  
- Response 

### Get Scrap Categories by slug
This will return scrap categories data from the slug that searched"
- Url  
  `/category/{slug}`  
- Method  
  GET  
- Response
  ```json
  {
    "data": {
        "id": 3,
        "name": "Kardus",
        "slug": "cardboard",
        "type": "recycleable",
        "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/scrap-categories/sLUb6nYOOow5m0hHNsacyzQ029sIC4pzQfPnG8cR.jpg",
        "desc": "<p>Kardus adalah&nbsp; kemasan yang biasanya terbuat dari bahan kertas kraft yang dibuat menjadi bahan bergelombang dengan ketinggian dan ketebalan gelombang tertentu. Kardus sangat sering kita jumpai untuk pengemasan produk, selain itu digunakan untuk penyimpanan berbagai barang seperti mainan, pakaian, dan lain sebagainya. Kardus ini dapat terurai setelah kurang lebih 5 bulan. Oleh karena itu, kita harus bisa memanfaatkan kardus ini dan membuatnya&nbsp; menjadi berbagai kerajinan yang bernilai estetik atau fungsional.</p>\n"
    }
  }
  ```  

### Get All Handicraft  
This will return all the handicrafts data and the categories of the handicraft  
- Url  
  `/handicraft`  
- Method  
  GET  
- Response  
  ```json  
  {
    "data": [
        {
            "id": 2,
            "slug": "pot-bunga-dari-botol-plastik-bekas",
            "scrap_category": {
                "id": 5,
                "name": "Botol Plastik",
                "slug": "bottle",
                "type": "recycleable",
                "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/scrap-categories/CX7xRqGf459Fp3lxlxJD2IJckGiqRhdmUxmJaDTN.png",
                "desc": "<p class=\"MsoNormal\">Botol&nbsp;plastik&nbsp;sangat sering digunakan, terutama\r\nuntuk minuman dalam kemasan. Namun, ternyata&nbsp;botol&nbsp;plastik&nbsp;tersebut\r\nbaru dapat&nbsp;terurai&nbsp;dalam&nbsp;waktu&nbsp;450 tahun. Ini disebabkan\r\nkarena rantai karbonnya yang panjang sehingga&nbsp;sulit&nbsp;diurai oleh\r\nmikroorganisme.&nbsp;Oleh karena itu, ayo kita manfaatkan botol plastik menjadi\r\nkarya kerajinan yang bernilai tinggi.&nbsp;<p></p></p>\n"
            },
            "title": "Pot Bunga dari Botol Plastik Bekas",
            "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/handicrafts//ZIL38QQ313Ih6H6y4nJXmvHUD20HPePGezEJZWxl.jpg",
            "desc": "<p>Mengisi waktu luang di rumah dengan menanam merupakan hobi yang menarik bagi sebagian besar orang. Media tanam yang paling banyak dipilih orang pada umumnya adalah pot. Daripada membelinya di pasaran dengan harga yang cukup mahal kamu bisa memanfaatkan botol bekas di rumah kamu untuk membuat berbagai macam pot yang unik dan cantik.</p>\n",
            "materials": "<div>Berikut alat dan bahan yang dibutuhkan.<ol><li>Botol plastik bekas</li><li>Pisau</li><li>Hiasan untuk mata</li><li>Pupuk/tanah untuk menanam</li><li>Tanaman</li></ol></div>\n",
            "process": "<div>Berikut adalah langkah - langkah pembuatannya.<ol><li>Siapkan bahan dan peralatan yang dibutuhkan.</li><li>Setelah semua sudah terkumpul, langkah selanjutnya adalah memotong botol plastik dengan pisau.</li><li>Ukurannya dikira-kira saja atau lihat pada gambar.</li><li>Beri sedikit hiasan sesuai keinginan. Jika ingin sesuai contohnya, tempelkan saja tutup botolnya sebagai mulut dan tambahkan mata boneka, lalu tempel.</li><li>Jangan lupa untuk melubangi bagian bawah botol agar air tidak mengendap di dalam botol.</li><li>Masukkan botol pupuk dan tanah ke dalam botol.</li><li>Masukkan bibit tanaman yang ingin ditanam.</li></ol></div>\n"
        },
        {
            "id": 3,
            "slug": "tas-dari-plastik-bekas-kopi-sachet",
            "scrap_category": {
                "id": 1,
                "name": "Plastik",
                "slug": "plastic",
                "type": "recycleable",
                "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/scrap-categories/C284gvNc763qBqEFCHTC9DV4UfXvWdeCa1adktmX.jpg",
                "desc": "<p class=\"MsoNormal\">Plastik merupakan polimer; rantai panjang atom yang mengikat\r\nsatu sama lain. Rantai ini membentuk banyak unit molekul berulang, atau\r\n\"monomer\". Plastik umumnya terdiri dari polimer karbon saja atau\r\ndengan oksigen, nitrogen, chlorine atau belerang di tulang belakang. (beberapa\r\nminat komersial juga berdasar silikon). Apakah kalian tahu bahwa plastik ini memerlukan waktu 50 - 100 tahun untuk terurai ? Oleh karena itu, manfaatkan plastik ini dengan bijak ya. Ayo temukan berbagai ide kerajinan yang bisa dibuat dengan&nbsp; plastik ini !<p></p><p></p></p>\n"
            },
            "title": "Tas Dari Plastik Bekas Kopi Sachet",
            "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/handicrafts//W5ahtrr7C2yZGE04Q5gNNv5uhKtmxY7I7XkG6pjv.jpg",
            "desc": "<div>Sampah plastik merupakan masalah yang serius karena&nbsp;<span style=\"font-size: 1rem;\">plastik membutuhkan waktu lama untuk terurai oleh tanah. Sebetulnya s</span><span style=\"font-size: 1rem;\">ampah ini dapat dijadikan kerajinan yang cantik dan sangat unik. </span><span style=\"font-size: 1rem;\">Sampah plastik seperti bungkus kopi instant, detergen, botol plastik dan lain sebagainya masih bisa diolah menjadi barang-barang yang lebih berguna dan bernilai jual.</span></div>\n",
            "materials": "<div>Berikut adalah bahan dan alat yang dibutuhkan.<ol><li>Bungkus kopi instan</li><li>Gunting</li><li>Penggaris</li><li>Jarum dan benang</li><li>Kain furing</li><li>Risleting</li></ol></div>\n",
            "process": "<div><span style=\"font-size: 1rem;\">Berikut adalah langkah - langkah pembuatannya.&nbsp;</span><ol><li><span style=\"font-size: 1rem;\">Gunting bagian atas dan bawah dari bungkus kopi sachet.</span></li><li>Bersihkan bungkus kopi yang sudah terpotong dengan air lalu keringkan.</li><li>Setelah kering, gunting bungkus kopi tersebut menjadi dua bagian sama rata</li><li> Lipat bungkus kopi tersebut dengan lipatan 1 cm ke bagian dalam ujung atas dan bawahnya, sehingga lebar lipatan menjadi 2 cm</li><li>Lalu anyam bungkus kopi tersebut menjadi berbentuk seperti baling-baling.&nbsp;<span style=\"font-size: 1rem;\">Kamu bisa melipatnya dengan tetap memperlihatkan sampul</span></li><li><span style=\"font-size: 1rem;\">Bungkus kopi tersebut atau bisa membaliknya terlebih dahulu agar tas yang kamu hasilkan akan berwarna perak.</span></li><li>Gabungkan anyaman tersebut dan pastikan untuk membuat sudut tegak vertikal agar t<span style=\"font-size: 1rem;\">as yang dibuat bisa dianyam ke arah atas dan&nbsp;</span><span style=\"font-size: 1rem;\">rapikan dengan menjahit bagian atas tas .</span></li><li>Tambahkan kain furing ataupun kain polos pada bagian dalam tas. Untuk menyatukan kain dengan tas bisa menggunakan jarum dan juga benang jahit.</li><li>Untuk finishing tambahkan risleting dan juga tali untuk mempercantik tas. Setelah bagian dalam tas dijahit dengan kain, lalu tambahkan risleting.</li></ol></div>\n"
        },
        ...
    ] 
  }
  ```  

### Get Handicraft by Slug  
This will search and return the handicraft data by its slug.  
- Url  
  `/handicraft/{slug}`  
- Method  
  GET  
- Response 
  ```json  
  {
    "data": {
        "id": 3,
        "slug": "tas-dari-plastik-bekas-kopi-sachet",
        "scrap_category": {
            "id": 1,
            "name": "Plastik",
            "slug": "plastic",
            "type": "recycleable",
            "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/scrap-categories/C284gvNc763qBqEFCHTC9DV4UfXvWdeCa1adktmX.jpg",
            "desc": "<p class=\"MsoNormal\">Plastik merupakan polimer; rantai panjang atom yang mengikat\r\nsatu sama lain. Rantai ini membentuk banyak unit molekul berulang, atau\r\n\"monomer\". Plastik umumnya terdiri dari polimer karbon saja atau\r\ndengan oksigen, nitrogen, chlorine atau belerang di tulang belakang. (beberapa\r\nminat komersial juga berdasar silikon). Apakah kalian tahu bahwa plastik ini memerlukan waktu 50 - 100 tahun untuk terurai ? Oleh karena itu, manfaatkan plastik ini dengan bijak ya. Ayo temukan berbagai ide kerajinan yang bisa dibuat dengan&nbsp; plastik ini !<p></p><p></p></p>\n"
        },
        "title": "Tas Dari Plastik Bekas Kopi Sachet",
        "image": "https://storage.googleapis.com/recycraft-c22-ps285.appspot.com/uploads/images/handicrafts//W5ahtrr7C2yZGE04Q5gNNv5uhKtmxY7I7XkG6pjv.jpg",
        "desc": "<div>Sampah plastik merupakan masalah yang serius karena&nbsp;<span style=\"font-size: 1rem;\">plastik membutuhkan waktu lama untuk terurai oleh tanah. Sebetulnya s</span><span style=\"font-size: 1rem;\">ampah ini dapat dijadikan kerajinan yang cantik dan sangat unik. </span><span style=\"font-size: 1rem;\">Sampah plastik seperti bungkus kopi instant, detergen, botol plastik dan lain sebagainya masih bisa diolah menjadi barang-barang yang lebih berguna dan bernilai jual.</span></div>\n",
        "materials": "<div>Berikut adalah bahan dan alat yang dibutuhkan.<ol><li>Bungkus kopi instan</li><li>Gunting</li><li>Penggaris</li><li>Jarum dan benang</li><li>Kain furing</li><li>Risleting</li></ol></div>\n",
        "process": "<div><span style=\"font-size: 1rem;\">Berikut adalah langkah - langkah pembuatannya.&nbsp;</span><ol><li><span style=\"font-size: 1rem;\">Gunting bagian atas dan bawah dari bungkus kopi sachet.</span></li><li>Bersihkan bungkus kopi yang sudah terpotong dengan air lalu keringkan.</li><li>Setelah kering, gunting bungkus kopi tersebut menjadi dua bagian sama rata</li><li> Lipat bungkus kopi tersebut dengan lipatan 1 cm ke bagian dalam ujung atas dan bawahnya, sehingga lebar lipatan menjadi 2 cm</li><li>Lalu anyam bungkus kopi tersebut menjadi berbentuk seperti baling-baling.&nbsp;<span style=\"font-size: 1rem;\">Kamu bisa melipatnya dengan tetap memperlihatkan sampul</span></li><li><span style=\"font-size: 1rem;\">Bungkus kopi tersebut atau bisa membaliknya terlebih dahulu agar tas yang kamu hasilkan akan berwarna perak.</span></li><li>Gabungkan anyaman tersebut dan pastikan untuk membuat sudut tegak vertikal agar t<span style=\"font-size: 1rem;\">as yang dibuat bisa dianyam ke arah atas dan&nbsp;</span><span style=\"font-size: 1rem;\">rapikan dengan menjahit bagian atas tas .</span></li><li>Tambahkan kain furing ataupun kain polos pada bagian dalam tas. Untuk menyatukan kain dengan tas bisa menggunakan jarum dan juga benang jahit.</li><li>Untuk finishing tambahkan risleting dan juga tali untuk mempercantik tas. Setelah bagian dalam tas dijahit dengan kain, lalu tambahkan risleting.</li></ol></div>\n"
    }
  }
  ```

## License
Recycraft uses several frameworks, including:
1. Laravel framework for the back-end which is an open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
2. AdminLTE for the admin front-end which is is an open source project by [AdminLTE.io](https://adminlte.io) that is licensed under [MIT](https://opensource.org/licenses/MIT).

<!-- Color : #04DE7D -->
