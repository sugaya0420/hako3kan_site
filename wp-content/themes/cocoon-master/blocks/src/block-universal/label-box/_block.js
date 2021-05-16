/**
 * Cocoon Blocks
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */

import { THEME_NAME, BLOCK_CLASS, ICONS, getIconClass, colorValueToSlug } from '../../helpers';
import classnames from 'classnames';

const { times } = lodash;
const { __ } = wp.i18n;
const { registerBlockType, createBlock } = wp.blocks;
const { InnerBlocks, RichText, InspectorControls, PanelColorSettings, ContrastChecker } = wp.editor;
const { PanelBody, SelectControl, BaseControl, Button } = wp.components;
const { Fragment } = wp.element;
const CAPTION_BOX_CLASS = 'label-box';
const DEFAULT_MSG = __( '見出し', THEME_NAME );

//classの取得
function getClasses(color) {
  const classes = classnames(
    {
      [ CAPTION_BOX_CLASS ]: true,
      [ `lb-${ colorValueToSlug(color) }` ]: !! colorValueToSlug(color),
      [ 'block-box' ]: true,
    }
  );
  return classes;
}

registerBlockType( 'cocoon-blocks/label-box-1', {

  title: __( 'ラベルボックス', THEME_NAME ),
  icon: 'tag',
  category: THEME_NAME + '-universal-block',
  description: __( 'ボックスに「ラベル見出し」入力できる汎用ボックスです。', THEME_NAME ),
  keywords: [ 'label', 'caption', 'box' ],

  attributes: {
    content: {
      type: 'string',
      default: DEFAULT_MSG,
    },
    color: {
      type: 'string',
      default: '',
    },
    icon: {
      type: 'string',
      default: '',
    },
  },
  transforms: {
    to: [
      {
        type: 'block',
        blocks: [ 'cocoon-blocks/caption-box-1' ],
        transform: ( attributes ) => {
          return createBlock( 'cocoon-blocks/caption-box-1', attributes );
        },
      },
      {
        type: 'block',
        blocks: [ 'cocoon-blocks/tab-caption-box-1' ],
        transform: ( attributes ) => {
          return createBlock( 'cocoon-blocks/tab-caption-box-1', attributes );
        },
      },
    ],
  },

  edit( { attributes, setAttributes } ) {
    const { content, color, icon } = attributes;

    return (
      <Fragment>
        <InspectorControls>
          <PanelBody title={ __( 'スタイル設定', THEME_NAME ) }>

            <BaseControl label={ __( 'アイコン', THEME_NAME ) }>
              <div className="icon-setting-buttons">
                { times( ICONS.length, ( index ) => {
                  return (
                    <Button
                      isDefault
                      isPrimary={ icon === ICONS[index].value }
                      className={ICONS[index].label}
                      onClick={ () => {
                        setAttributes( { icon: ICONS[index].value } );
                      } }
                    >
                    </Button>
                  );
                } ) }
              </div>
            </BaseControl>

          </PanelBody>

          <PanelColorSettings
            title={ __( '色設定', THEME_NAME ) }
            initialOpen={ true }
            colorSettings={ [
              {
                value: color,
                onChange: ( value ) => setAttributes( { color: value } ),
                label: __( '色設定', THEME_NAME ),
              },
            ] }
          >
            <ContrastChecker
              color={ color }
            />
          </PanelColorSettings>

        </InspectorControls>

        <div className={ getClasses(color) }>
          <div className={'label-box-label block-box-label' + getIconClass(icon)}>
            <span className={'label-box-label-text block-box-label-text'}>
              <RichText
                value={ content }
                onChange={ ( value ) => setAttributes( { content: value } ) }
                placeholder={ DEFAULT_MSG }
              />
            </span>
          </div>
          <div className="label-box-content">
            <InnerBlocks />
          </div>
        </div>
      </Fragment>
    );
  },

  save( { attributes } ) {
    const { content, color, icon } = attributes;
    return (
      <div className={ getClasses(color) }>
        <div className={'label-box-label block-box-label' + getIconClass(icon)}>
          <span className={'label-box-label-text block-box-label-text'}>
            <RichText.Content
              value={ content }
            />
          </span>
        </div>
        <div className="label-box-content">
          <InnerBlocks.Content />
        </div>
      </div>
    );
  }
} );