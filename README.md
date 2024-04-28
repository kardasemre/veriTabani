Bu projede amaçlanan aslında bir otomasyon şeklinde yönetim kısmının veri ekleme, silme, güncelleme işlemlerini yapabilmesi. Kullanıcı kısmının da bütün verileri değil de veritabanında oluşturulan viewler sayesinde belirli verileri görüntüleyebilmesi amaçlanmıştır.


Proje açıldığı zaman karşımıza gelen ekran direkt olarak yönetici paneli gibi düşünülebilir. Gerekli değiştirmeler ve sorgular ile hem yönetici paneli hem de kullanıcı paneli yapılabilir.
![index phpss](https://github.com/brokolifha/veriTabaniProje/assets/41892833/e499337e-cc74-4434-bb85-af5880dab39c)




Etkinlikler sayfasına tıklandığı zaman bizi karşılayacak ekran aşağıda görüldüğü gibidir.

![etkinlikler php ss](https://github.com/brokolifha/veriTabaniProje/assets/41892833/c5be4572-fd31-40f0-9159-b98ff7144939)

Yukarıda ki fotoğrafta da görüldüğü üzere belli inputlardan gelen veriler değişkenlere aktarılarak veritabanına kayıt işlemleri gerçekleştirilebiliyor, eklenen verilerin yan taraflarında ki butonlar sayesinde veriler isteğe bağlı silinebilir ve güncellenebilir.
Güncelleme butonuna tıklandığı zaman Javascript ile yapılan bir Modal karşımıza geliyor. Bu modal güncelleme butonuna tıklandığı zaman yeni bir form oluşturuyor ve bütün veriler otomatik olarak formun içinde ki textboxlara aktarılıp üzerinde değişiklikler yapılabiliyor.

![güncellememodalıetkinlikler php ss](https://github.com/brokolifha/veriTabaniProje/assets/41892833/f33e85bb-edf9-4f4d-b2a3-9dbad924a5cc)

Herhangi bir güncelleme işlemi yapılmak istenmiyorsa veya yanlışlıkla tıklandıysa modalın sol üst köşesinde görünen küçük çarpı(x) işareti ile modal kapatılabiliyor ve herhangi bir güncelleme işlemi yapılmamış oluyor.

Not: Bu bölümde Tarih saat eklemeleri elle yazılarak değil gerekli scriptler kullanılarak tarih saat seçim ekranından(datetimepicker) seçiliyor ve otomatik olarak textbox içerisine aktarılıyor. Hem ekleme formunda hem de güncelleme modalında.
![tarihSaatEkleme](https://github.com/brokolifha/veriTabaniProje/assets/41892833/447ee915-cae3-4583-8ba4-fa7e3fbf3d55)

Tekrar sol yukarıda bulunan "Anasayfa" butonuna tıklayarak index.php ye yani anasayfaya dönebiliyoruz.

Anasayfa üzerinden "Katılımcılar" butonuna tıkladığımız zaman benzer görünüm özelliklerinde bir sayfa daha bizi karşılıyor. Yine aynı özellikler burada da geçerli. Ekleme, silme ve güncelleme işlemleri yapılabiliyor. Güncelle butonu ile bir güncelleme modalı açılıyor ve gerekli işlemler yapılabiliyor.

![katilimcilar php ss](https://github.com/brokolifha/veriTabaniProje/assets/41892833/5c23d95d-0745-419e-9c72-269deb31a032)


Tekrardan anasayfa ekranına döndüğümüz zaman Oturumlar butonuna tıkladığımız zaman oturumlar.php sayfasına yönlendiriliyoruz. Burada da diğer sayfalar ile aynı işlemleri yapabiliyoruz fakat burada farklı olan bir kısım veritabanında ki Etkinlikler tablosunun içerisinde ki etkinlikadı verilerini bir select inputu ile ekranda gösterebiliyoruz.
Bunun amacı ise oturumlar ve etkinlikler bağlantılı iki tablo oldukları için etkinliklerin ıd numaralasına göre listeleyip oturumların hangi konularda olacağını seçip eklemeler yapabiliyoruz.
![oturumlar php css](https://github.com/brokolifha/veriTabaniProje/assets/41892833/a7153e67-bce9-41d5-952c-9a0531e7d518) Güncelleme işlemleri için yine bir modal aracılığı ile rahatça yapılabilir hale getiriyoruz. 
Not: Tarih ve saat seçerken önce ki sayfalarda bulunan datetimepicker kullanılarak el ile yanlış veri girilmesinin önüne geçilmiştir.

Tekrardan anasayfaya dönüş yapıp stantlar butonuna tıkladığımız zaman bizi benzer bir ekran karşılayacaktır. Burada da stantları hangi katılımcılar kullanacak ve ne süreli kullanmak istediklerinin verileri tutulmaktadır.
Katılımcı adı select inputunda yine katılımcılar tablosundan katılımcı id verisine göre katılımcıların bilgileri çekilip ona göre eklemeler yapılabiliyor.

![stantlar php css](https://github.com/brokolifha/veriTabaniProje/assets/41892833/eba96d84-68a9-450c-885c-66aafe16d6c2)



Tekrar anasayfaya dönüş yapıldıktan sonra, anasayfanın en sağında olan Kullanıcının görebileceği veriler butonuna tıkladığımız zaman bizi veritabanında oluşturduğumuz viewleri görünteleyebileceğimiz ekrana yönlendirir.
![index views php ss](https://github.com/brokolifha/veriTabaniProje/assets/41892833/28d056e8-2bef-4059-92e3-1eede9d0f7ee)

Yukarıda ki fotoğrafta görebileceğiniz gibi bir menü vardır ve kullanıcı gözünden her detayı vermeden ve veritabanı üzerinden 
ilişkili veya ilişkisiz tabloları belirli kodlar ile(JOIN,INNER JOIN, LEFT J, RIGHT J) ilişkilendirip ekranda listeler.












