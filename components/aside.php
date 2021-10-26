<aside class="menu">
            <div class="menu__reviews">
                <span class="menu__reviews_span" data-href="https://proweb.uz/">
                    <i class="far fa-chevron-right"></i>
                </span>
                <span class="menu__reviews_text">Оставить озыв</span>
            </div>
            <ul class="menu__list">
                <? foreach ($pages as $address => $info) {
                   if ($info['icon']) {?>
                  <li>
                  <a href="./?route=<?= $address?>" class="menu__list-link <?= $_GET['route'] == $address ? 'active' : ''?>">
                  <i class="<?= $info['icon']?>"></i><?= $info['name']?></a>
                  </li>
                <?
                   }
            }?>
            </ul>
</aside>