/**
 * Cocoon Blocks
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

import {THEME_NAME, BadgeToolbarButton } from '../helpers.js';
const { Fragment } = wp.element;
const { __ } = wp.i18n;
const { registerFormatType, toggleFormat } = wp.richText;
const FORMAT_TYPE_NAME = 'cocoon-blocks/badge';
const TITLE = __( 'オレンジ', THEME_NAME );

registerFormatType( FORMAT_TYPE_NAME, {
  title: TITLE,
  tagName: 'span',
  className: 'badge',
  edit({isActive, value, onChange}){
    const onToggle = () => onChange(toggleFormat(value,{type:FORMAT_TYPE_NAME}));

    return (
      <Fragment>
        <BadgeToolbarButton
          icon="tag"
          title={<span className="badge">{TITLE}</span>}
          onClick={ onToggle }
          isActive={ isActive }
        />
      </Fragment>
    );
  }
} );