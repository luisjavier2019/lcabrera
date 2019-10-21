<template>
<div>
	<div class="row" v-if="articles" >
		 <b-card
		    v-for="(item,idx) in articles"
		    v-bind:key="item.id"
		    :title="item.name"
		    :img-src="item.resource_cover"
		    img-alt="Image"
		    img-top
		    tag="article"
		    style="max-width: 20rem;"
		    class="mb-2 padding-card col-md-4">
		    <b-card-text>
		      {{ item.description }}
		    </b-card-text>

		    <b-button pill v-bind:href="`/articles/${item.id}`" variant="primary">
		    		Detalle</b-button>

		    <b-button pill href="#" variant="danger">
		    		Editar</b-button>

		  </b-card>
	</div>
	<div v-else>
		Cargando informacion
		   <b-spinner variant="success" type="grow" label="Spinning"></b-spinner>
		     <b-spinner variant="success" type="grow" label="Spinning"></b-spinner>
	</div>
</div>
</template>
<script type="text/javascript">
	export default{
		mounted(){
			this.loadArticle();
		},
		data(){
			return{
				articles:null
			}
		},
		methods:{
			loadArticle(){
				axios.get('/api/lists-articles')
				.then((response)=>{
					this.articles=response.data;
				});
			}
		}
	}
</script>
<style type="text/css" scoped>
	.padding-card{
		padding: 8px!important;
	}
</style>