<?php
//Template Name: Produtos

get_header(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php include(TEMPLATEPATH . "/inc/introducao.php"); ?>

<!-- Bloco loop custom post - inicio -->
<?php 
// https://codex.wordpress.org/Class_Reference/WP_Query
// https://developer.wordpress.org/reference/classes/wp_query/

	$args = array (
		'post_type' => 'produtos',
		'order' => 'ASC'
 	);	

	 $the_query = new WP_Query( $args );
?>

<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

<a href="<?php the_permalink(); ?>">
	<section class="container produto_item animar-interno">
		<div class="grid-11">
			<img src="<?php the_field('foto_produto1'); ?>" alt="Bikcraft <?php the_title(); ?>">
			<h2><?php the_title(); ?> </h2>
		</div>
		<div class="grid-5 produto_icone"><img src="<?php the_field('icone_produto'); ?>" alt="Icone <?php the_title(); ?>"></div>	
	</section>
</a>
<?php endwhile; else: endif; ?>
<!-- Bloco loop custom post - FIM -->
<?php wp_reset_query(); wp_reset_postdata(); //Resetar o loop para dar continuidade no outro loop principal da página?>
		
<?php include(TEMPLATEPATH . "/inc/produtos-orcamento.php"); ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>