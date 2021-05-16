/**
 * Cocoon Blocks
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

import {THEME_NAME, LetterToolbarButton } from '../helpers.js';
const { Fragment } = wp.element;
const { __ } = wp.i18n;
const { registerFormatType, toggleFormat } = wp.richText;
const { RichTextShortcut, RichTextToolbarButton } = wp.editor;
const FORMAT_TYPE_NAME = 'cocoon-blocks/bold';
const TITLE = __( '太字（boldクラス指定）', THEME_NAME );

registerFormatType( FORMAT_TYPE_NAME, {
  title: TITLE,
  tagName: 'span',
  className: 'bold',
  edit({isActive, value, onChange}){
    const onToggle = () => onChange(toggleFormat(value,{type:FORMAT_TYPE_NAME}));

    return (
      <Fragment>
        <LetterToolbarButton
          icon={'editor-bold'}
          title={<span className="bold">{TITLE}</span>}
          onClick={ onToggle }
          isActive={ isActive }
        />
      </Fragment>
    );
  }
} );