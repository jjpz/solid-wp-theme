<section class="no-results not-found">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'solid' ); ?></h1>
        </header>
        <div class="page-content">
            <p>
                <?php
                printf(
                    esc_html__('Try one of the links above or go to the %s.', 'solid'),
                    sprintf(
                        '<a href="%s">%s</a>',
                        esc_url(home_url()),
                        esc_html__('home page', 'solid')
                    )
                );
                ?>
            </p>
        </div>
    </div>
</section>