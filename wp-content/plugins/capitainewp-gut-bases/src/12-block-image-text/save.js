import { __ } from '@wordpress/i18n'
import { useBlockProps, RichText } from '@wordpress/block-editor'

export default function save( props ) {
	const blockProps = useBlockProps.save()

	return (
		<div { ...blockProps }>
			<div>
				<img className="image" src={ props.attributes.pictureURL } alt={ props.attributes.pictureAlt } />
				<p className="first-line">
					<span>#</span>
					<RichText.Content
						tagName="span"
						className="number"
						value={ props.attributes.number }
					/>
				</p>

				<RichText.Content
					tagName="h2"
					className="title"
					value={ props.attributes.title }
				/>
			</div>
		</div>
	)
}
