/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';
import { Button, Placeholder } from '@wordpress/components';
import { Icon } from '@wordpress/icons';

/**
 * Internal dependencies
 */
import { defaultIcon, iconFontAwesome } from '../../icons/default';
import Inserter from '../inserter';

export default function Opener(props) {
	const {
		isInserterOpen,
		setInserterOpen,
	} = props;

	const instructions = () => {
		const messages = {
			default: __(
				'Choose an icon from the library.',
				'icon-font-awesome'
			),
			noCustom: __(
				'Choose an icon from the library.',
				'icon-font-awesome'
			),
			noMediaLibrary: __(
				'Select an icon from Font Awesome.',
				'icon-font-awesome'
			),
			noCustomNoMediaLibrary: __(
				'Explore the icon library and choose one.',
				'icon-font-awesome'
			),
		};

		return messages.default;
	};

    const openInserter = () => {
        // Add your class to the body element
        document.body.classList.add('blockIconsInserterOpen');
        document.body.classList.add('blockIcons');

        // Open the Inserter
        setInserterOpen(true);

        // Remove the class after 3 seconds
        setTimeout(() => {
            document.body.classList.remove('blockIconsInserterOpen');
        }, 1200);
    };

	return (
		<Placeholder
			className="has-illustration"
			icon={defaultIcon}
			label={__('Font Awesome', 'icon-font-awesome')}
			instructions={instructions()}
		>
			<Icon
				className="wp-icon-font-awesome__opener"
				icon={iconFontAwesome}
			/>
			 <Button isPrimary onClick={openInserter}>
				{__('Icon Library', 'icon-font-awesome')}
			</Button>
			<Inserter
				setInserterOpen={setInserterOpen}
				isInserterOpen={isInserterOpen}
			/>
		</Placeholder>
	);
}
