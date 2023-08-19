<?php

function stnc_wp_floor_plans_adminMenu_About_contents()
{
    //  $to = get_option('admin_email');
    // $options = get_option( 'stnc_wp_floor_option' ); 
    // echo "<pre>";
    // print_r($options['email_adress']); // id of the field

?>
    <div id="advanced" class="postbox ">
        <div class="inside">
            <div class="card shadow1" style="max-width:100%!important">
                <h2>    <?php esc_html_e( 'Support', 'the-stnc-map' ) ?>  </h2>

            </div>
<pre>
================================================================================
        v2.4.0 Important changes and bug fixes in the release 
================================================================================
- Implemented: degisiklikleri mail ile gonderme ozelligi eklendi responsive arayuz ve ayrintili bilgi sunan mail olayi gelistirildi
- Implemented: ayarlar icin codestar framework kullanilacak https://codestarframework.com/documentation/#/ 
- Implemented: cakismalari onlemek icin css de boostrap grid yerine SIMPLE GRID yapisina gecis yapildi
- Implemented: bos binalar listelemesi yapildi 
- Implemented: haritadada bos ofisleri kirmizi ile gosterme ozelligi eklendi 
- Implemented: firmanin web sitesinde tamamen gorunmesi icin KVKK bla bla eklendi 
- Changed: pages yapisi degistirildi daha anlasilir hale geldi
- Changed: css ve js yukleyici yenilendi daha anlasilir hale geldi TODO: asset klasoru admin ve frontend olarak ayrilacak  
- Bug fix: TODO : onceki sonraki ofis olayi iptal edildi ilerde acilacak 
- Bug fix: Eksik ceviriler yapildi
- Bug fix: firma eklerken  kategori secmeme sorunu duzeltildi
- Bug fix:  firma gosterimde ofisin bilgilerini gostermeyi unutmusuz orasi eklendi ve arayuzu daha guzel hale getirildi.
- TODO : las vegas da gordugum ozellik https://www.venetianlasvegas.com/digital-resort-map.html?map=on  The Venetian Resort Digital Map v3 de yapilacak 



================================================================================
        v1.5.0 Important changes and bug fixes in the release 
================================================================================
- Implemented: ofisi bosaltan firmalarin tutulacagi bir kolon eklendi - ama bu ozellik v3 de aktif olacaktir
- Implemented:  ingilizce dil destegi eklendi tum ceviriler yapildi
- Bug fix:  pages yapisindaki hata giderildi
- Bug fix: install table de eksik yuklemeler varmis onlar duzeltildi




================================================================================
        v1.0.0 Important changes and bug fixes in the release 
================================================================================
- Implemented:  eski sistemdeki veriler ve haritalar yeniden olusturuldu
- Changed: daha gelismis haritalama sistemi yazildi artik haritayi kullanicinin yukleyebilecegi bir arayuz ve konum belirleme arayuzu var https://anseki.github.io/plain-draggable/
- Implemented: firma listesini web sitesinde gosterecek shortcut
- Implemented: gelismis shortcut ozelligi her kat icin ozel listeleme 
- Bug fix: odemelerde silmede yaşanan sorun vardı düzeltidli 
- Implemented:  air ile çalışılmaya başlandı 
   </pre>
        </div>
    </div>

<?php

}


