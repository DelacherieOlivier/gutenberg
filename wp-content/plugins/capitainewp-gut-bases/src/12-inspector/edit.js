import { __ } from '@wordpress/i18n'
import {
	useBlockProps,
	RichText,
	BlockControls,
	AlignmentToolbar,
	InspectorControls,
	PanelColorSettings,
	MediaUpload,
	MediaUploadCheck,
} from '@wordpress/block-editor'
import {
	PanelBody,
	ButtonGroup,
	Button,
	ToggleControl,
	RangeControl,
	Placeholder,
} from '@wordpress/components'
import { Fragment } from '@wordpress/element'

import './editor.scss'

export default function Edit( props ) {
	const blockProps = useBlockProps()

	const onSelectImage = picture => {

		console.log(picture) // Afficher les informations récupérées de l'image

		props.setAttributes( {
			pictureID: picture.id,
			pictureURL: picture.url,
			pictureAlt: picture.alt,
		})
	}

	// Effacement des données de l'image
	const onRemoveImage = () => {
		props.setAttributes({
			pictureID: null,
			pictureURL: null,
			pictureAlt: null,
		})
	}


	return (
		<Fragment>

			<BlockControls>
				<AlignmentToolbar
					value={ props.attributes.alignment }
					onChange={ alignment => props.setAttributes( { alignment: alignment } ) }
				/>
			</BlockControls>

			<InspectorControls>
				<PanelBody title={ __( 'Chapter sign', 'capitainewp-gut-bases' ) }>
					<ButtonGroup>
						{ ['#', 'n°', '§'].map( (sign) => (
							<Button
								isLarge
								isPrimary={ props.attributes.chapterSign == sign }
								onClick={ () => props.setAttributes( { chapterSign: sign } ) }
							>
								{ sign }
							</Button>
						) ) }
					</ButtonGroup>
				</PanelBody>

				<PanelColorSettings
					title={ __( 'Colors', 'capitainewp-gut-bases' ) }
					colorSettings={ [
						{
							value: props.attributes.textColor,
							onChange: textColor => props.setAttributes( { textColor } ),
							label: __( 'Title color', 'capitainewp-gut-bases' ),
						},
						{
							value: props.attributes.backgroundColor,
							onChange: backgroundColor => props.setAttributes( { backgroundColor } ),
							label: __( 'Background color', 'capitainewp-gut-bases' ),
						},
					] }
				/>

				<PanelBody title={ __( 'Border', 'capitainewp-gut-bases' ) }>
					<ToggleControl
						label={ __( 'Radius', 'capitainewp-gut-bases' ) }
						checked={ props.attributes.withRadius }
						onChange={ () => props.setAttributes( { withRadius: ! props.attributes.withRadius } ) }
					/>

					{ props.attributes.withRadius && (
						<RangeControl
							value={ props.attributes.radius }
							onChange={ radius  => props.setAttributes( { radius } ) }
							min={ 0 }
							max={ 30 }
							beforeIcon="arrow-down"
							afterIcon="arrow-up"
						/>
					)}
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }
				style={ {
					borderRadius: props.attributes.withRadius ? props.attributes.radius : null,
					backgroundColor: props.attributes.backgroundColor,
					textAlign: props.attributes.alignment,
				} }
			>
				<div className="content">
					<p
						className="first-line"
						style={ {
							color: props.attributes.textColor
						} }
					>
						<span>{props.attributes.chapterSign}</span>
						<RichText
							tagName="span"
							placeholder="1"
							value={ props.attributes.number }
							className="number"
							onChange={ number => props.setAttributes( { number } ) }
						/>
					</p>
					<RichText
						tagName="h2"
						placeholder={ __( 'Your title here', 'capitainewp-gut-bases' ) }
						value={ props.attributes.title }
						className="title"
						onChange={ title => props.setAttributes( { title } ) }
					/>
				</div>

				{ ! props.attributes.pictureID ? (
					<MediaUploadCheck>
						<MediaUpload
							onSelect={ onSelectImage }
							allowedTypes={ [ 'image' ] }
							value={ props.attributes.pictureID }
							render={ ( { open } ) => (
								<Placeholder
									icon="images-alt"
									label={ __( 'Photo', 'capitainewp-gut-bases' ) }
									instructions={ __( 'Select a picture', 'capitainewp-gut-bases' ) }
								>
									<Button
										isSecondary
										isLarge
										onClick={ open }
										icon="upload"
									>
										{ __( 'Import', 'capitainewp-gut-bases' ) }
									</Button>
								</Placeholder>
							) }
						/>
					</MediaUploadCheck>

				) : (

					<p className="capitaine-image-wrapper">
						<img
							src={ props.attributes.pictureURL }
							alt={ props.attributes.pictureAlt }
						/>

						{ props.isSelected && (

							<Button
								className="capitaine-remove-image"
								onClick={ onRemoveImage }
								icon="dismiss"
							>
								{ __( 'Remove picture', 'capitainewp-gut-bases' ) }
							</Button>

						) }
					</p>
				) }
			</div>

		</Fragment>
	)
}
