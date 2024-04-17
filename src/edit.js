/**
 * External dependencies
 */
import { isEmpty } from 'lodash';

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n';

import {
	PanelBody,
	RangeControl,
	ColorPalette,
} from '@wordpress/components';

import {
	useBlockProps,
	BlockControls,
	InspectorControls,
	JustifyContentControl,
} from '@wordpress/block-editor';

import { useState } from '@wordpress/element';

import {
	Opener,
	Inserter,
} from './components';

import {
	flattenIconsArray,
} from './utils';

import { defaultIcon } from './icons/default';
import getIcons from './icons';

/**
 * The edit function for the Icon Block.
 *
 * @param {Object} props All props passed to this function.
 * @return {WPElement}   Element to render.
 */
export function Edit(props) {
	const {
		attributes,
		setAttributes,
	} = props;
	const {
		icon,
		iconName,
		justification,
		fontSize,
		color,
		hoverColor
	} = attributes;

	// State to control whether the Inserter component (icon inserter) is open or closed.
	const [isInserterOpen, setInserterOpen] = useState(false);

	// Fetch all icons and flatten the array
	const iconsAll = flattenIconsArray(getIcons());

	// Filter named icon from the array
	const namedIcon = iconsAll.filter((i) => i.name === iconName);
	let customIcon = defaultIcon;

	if (icon && isEmpty(namedIcon)) {
		// Parse custom icons if provided
		customIcon = icon;

		// If parsed icon has no valid props, fallback to default
		if (isEmpty(customIcon?.props)) {
			customIcon = defaultIcon;
		}
	}

	// Default to an empty string for printedIcon
	let printedIcon = !isEmpty(namedIcon) ? namedIcon[0].icon : customIcon;

	// Block controls for alignment
	const blockControls = (
		<BlockControls group="block">
			<JustifyContentControl
				value={justification}
				onChange={(value) => {
					setAttributes({ justification: value });
				}}
			/>
		</BlockControls>
	);

	// Inspector controls for block settings
	const inspectorControls = (icon || iconName) && (
		<InspectorControls>
			<PanelBody title={__('Settings', 'icon-font-awesome')}>
				<label style={{ marginBottom: '8px', display: 'block' }}>
					{__('Color', 'icon-font-awesome')}
				</label>
				<ColorPalette
					className='icon-font-awesome-color'
					value={color}
					onChange={(value) =>
						setAttributes({ color: value })
					}									
				/>
				<label style={{ marginBottom: '8px', display: 'block' }}>
					{__('Hover color', 'icon-font-awesome')}
				</label>
				<ColorPalette
					className='icon-font-awesome-color'
					value={hoverColor}
					onChange={(value) =>
						setAttributes({ hoverColor: value })
					}									
				/>				
				<RangeControl
					label={__('Font Size', 'icon-font-awesome')}
					value={fontSize}
					onChange={(value) =>
						setAttributes({ fontSize: value })
					}
					min={15}
					step={1}
					max={250}
				/>
			</PanelBody>
		</InspectorControls>
	);

	// Apply aria-label if namedIcon is not empty
	if (!isEmpty(namedIcon)) {
		printedIcon = {
			...printedIcon,
			props: {
				...printedIcon.props,
				'aria-label': namedIcon[0].title,
				style: {
					...(printedIcon.props.style || {}),
					// fontVariationSettings: `"FILL" ${fill ? 1 : 0}, "wght" ${weight}, "GRAD" ${grade}, "opsz" ${opsz}`,
					textAlign: justification,
					fontSize: fontSize,
					color: color,
					"--icon-font-awesome-hover-color": hoverColor
				},
			},
		};
	}

	// Handle classes with classnames library
	const blockIconClasses = 'box-icon';

	// Markup for the icon
	const iconMarkup = (
		<div className={blockIconClasses}>
			{printedIcon}
		</div>
	);

	return (
		<>
			{blockControls}
			{inspectorControls}
			<div
				{...useBlockProps({
					className: 'myclass',
				})}
			>
				{/* Conditional rendering of Opener */}
				{!icon && !iconName ? (
					<Opener
						setInserterOpen={setInserterOpen}
						attributes={attributes}
						setAttributes={setAttributes}
					/>
				) : (
					iconMarkup
				)}
			</div>
			<Inserter
				isInserterOpen={isInserterOpen}
				setInserterOpen={setInserterOpen}
				attributes={attributes}
				setAttributes={setAttributes}
			/>
		</>
	);
}

export default Edit;
