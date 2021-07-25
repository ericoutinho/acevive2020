    <footer class="pt-5">
        <div class="container">
            <div class="row pb-5">
                <div class="col-12 col-lg-3 order-1 mb-4 mb-lg-0">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'  => 'menu-inferior',
                            'container'       => 'ul',
                            'container_class' => 'list-unstyled',
                            'container_id'    => 'footer-menu',
                            'menu_id'         => 'footer-menu',
                            'menu_class'      => 'list-unstyled',
                        ) );
                    ?>
                </div>

                <div class="col-12 col-lg-4 order-3 order-lg-2 text-center text-lg-left">
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            Av. N. Senhora da Penha, 2796, sl.801<br/>
                            Santa Luiza, Vitória/ES<br/>
                            Cep: 29045-402
                        </li>
                        <li class="mb-3"><a href="mailto:contato@acevive.com"><i class="fas fa-envelope mr-2"></i>contato@acevive.com</a></li>
                        <li class="mb-4">
                            <h4>
                                27 3041-6595<br/>
                                27 99918-6595
                            </h4>
                        </li>
                        <li class="mb-4">
                            <a href="https://wa.me/5527999186595" class="btn btn-success"><i class="fab fa-whatsapp fa-lg mr-2"></i>Chame no Whatsapp</a>
                        </li>
                        <li>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="https://facebook.com/acevive.vix"><i class="fab fa-facebook-square fa-2x fa-fw"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://instagram.com/acevive.vix"><i class="fab fa-instagram fa-2x fa-fw"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://linkedin.com/acevivevix"><i class="fab fa-linkedin fa-2x fa-fw"></i></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-5 order-2 order-lg-3 mb-4 mb-lg-0">
                    <?=do_shortcode("[form-newsletter]")?>
                </div>
            </div>
        </div>
        <div id="footer-copyright" class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center" style="font-size: .9rem;">
                        Acevive &copy; 2019 - <?=date('Y')?> &bullet; Todos os direitos reservados
                    </div>
                </div>
            </div>
        </div>
    </footer>