            <div id="navbar" class="navbar-collapse collapse">
            <?php
              // It needs to be refactor, but I like the simple solutuion =)
              function recursive_menu($parent_id = 0)
              {
                $items = Modules\Menu\Database\Models\Menu::wherePublic(1)->whereParent_id($parent_id)->orderBy('position')->get();
                ?>

                @if (count($items))
                  <ul class="{{ ($parent_id == 0)?'nav navbar-nav':'dropdown-menu' }}">
                  <?php
                  foreach ($items as $item):

                    $counts = Modules\Menu\Database\Models\Menu::wherePublic(1)->whereParent_id($item->id)->count();

                    if ($counts)
                    {
                      echo '
                        <li class="dropdown">
                          <a href="'.$item->link.'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'.$item->text.'</a>';
                            recursive_menu($item->id);
                      echo '</li>';
                    }
                    else
                    {
                      echo '<li><a href="'.$item->link.'">'.$item->text.'</a></li>';
                    }

                  endforeach;
                  ?>
                  </ul>
                @endif


                <?php
              }

              recursive_menu();
            ?>
<!--               <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul> -->
            </div>