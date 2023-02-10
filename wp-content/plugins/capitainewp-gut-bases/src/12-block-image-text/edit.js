import { __ } from '@wordpress/i18n'
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor'
import { Placeholder, Button } from '@wordpress/components'

import './editor.scss' // On importe la feuille de style pour l'éditeur

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

		<div { ...blockProps }>
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
						className="image"
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
			<p className="first-line">
				<span>#</span>
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
	)
}
