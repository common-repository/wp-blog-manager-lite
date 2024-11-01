const {registerBlockType} = wp.blocks; //Blocks API
const {createElement} = wp.element; //React.createElement
const {__} = wp.i18n; //translation functions
const {InspectorControls} = wp.blockEditor; //Block inspector wrapper
const {serverSideRender} = wp;
const {TextControl,SelectControl} = wp.components; //WordPress form inputs and server-side renderer

registerBlockType( 'wpbm-display-block/wpbm-widget', {
	title: __('WP Blog Manager Lite'), //Block Title
	category: __( 'media' ), //Category
	attributes: {
		heading: {
			default: __('WP Blog Manager Lite Title'),
			type: 'string'
		},
		heading_tag : {
			default: 'h2',
			type:'string'
		},
		wpbm_id : {
			default: '',
			type: 'string'
		},
	},
	//Displat the post title
	edit(props){

		const wpbmlite = WPBM_logos_array;

		const attributes = props.attributes;
		const setAttributes = props.setAttributes;

		const headingTags = [
		{ label: 'Heading 1', value: 'h1'},
		{ label: 'Heading 2', value: 'h2'},
		{ label: 'Heading 3', value: 'h3'},
		{ label: 'Heading 4', value: 'h4'},
		{ label: 'Heading 5', value: 'h5'},
		{ label: 'Heading 6', value: 'h6'}
		];

		//Function to update heading level
		function changeHeading(heading){
			setAttributes({heading});
		}

		//Function to update id attribute
		function changeheadingTag(heading_tag){
			setAttributes({heading_tag});
		}

		//Function to update id attrbutes
		function changeWpbmId(wpbm_id){
			setAttributes({wpbm_id});
		}

		//Display Block Preview and UI
		return createElement('div', {}, [
			//Preview a block with PHP render callback
			createElement( serverSideRender, {
				block: 'wpbm-display-block/wpbm-widget',
				attributes: attributes
			} ),
			//Block Inspector
			createElement( InspectorControls, {}, 
				[
				createElement(TextControl, {
					value: attributes.heading,
					label: __( 'Title'),
					onChange: changeHeading,
				}),
				createElement(SelectControl, {
					value: [attributes.heading_tag],
					label: __( 'Title Tag' ),
					onChange: changeheadingTag,
					options: headingTags,
				}),
				createElement(SelectControl, {
					value: [props.attributes.wpbm_id],
					lable: __( 'WP Blog Manager' ),
					onChange: changeWpbmId,
					options: wpbmlite
				}),
				]
				)
			] )
	},
	save(){
		return null; //Save has to exist. This is all we need.
	}
});