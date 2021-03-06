//*******************************************************************
//       ByteScout PDF Extractor SDK		                                     
//                                                                   
//       Copyright © 2016 ByteScout - http://www.bytescout.com       
//       ALL RIGHTS RESERVED                                         
//                                                                   
//*******************************************************************

using System;
using Bytescout.PDFExtractor;

// To compile the example copy missing .traineddata files from REDISTRIBUTABLE folder to "tessdata" project folder.
// or download from http://code.google.com/p/tesseract-ocr/downloads/list
// Make sure "Copy to Output Directory" property of each added language file is set to "Copy always".
// Note: Do not rename the "tessdata" folder - its name is hardcoded in OCR engine.

namespace WebApplication1
{
	public partial class Default : System.Web.UI.Page
	{
		protected void Page_Load(object sender, EventArgs e)
		{
			String inputFile = Server.MapPath("sample_ocr.pdf");
            // Set the location of 
		    String ocrLanguageDataFolder = Server.MapPath(@"tessdata");

			// Create Bytescout.PDFExtractor.TextExtractor instance
			using (TextExtractor extractor = new TextExtractor())
			{
				extractor.RegistrationName = "demo";
				extractor.RegistrationKey = "demo";

                // Enable Optical Character Recognition (OCR)
				// in .Auto mode (SDK automatically checks if needs to use OCR or not)
				extractor.OCRMode = OCRMode.Auto;
				// Set the location of "tessdata" folder containing language data file
                extractor.OCRLanguageDataFolder = ocrLanguageDataFolder;
                // Set OCR language
				extractor.OCRLanguage = "eng"; // "eng" for english, "deu" for German, "fra" for French, "spa" for Spanish etc - according to files in /tessdata
				// Set PDF document rendering resolution
				extractor.OCRResolution = 300;


				// You can also apply various preprocessing filters
				// to improve the recognition on low-quality scans.
				
				// Automatically deskew skewed scans
				//extractor.OCRImagePreprocessingFilters.AddDeskew();

				// Repair broken letters
				//extractor.OCRImagePreprocessingFilters.AddDilate();

				// Remove vertical or horizontal lines (sometimes helps to avoid OCR engine's page segmentations errors)
				//extractor.OCRImagePreprocessingFilters.AddVerticalLinesRemover();
				//extractor.OCRImagePreprocessingFilters.AddHorizontalLinesRemover();

				// Remove noise
				//extractor.OCRImagePreprocessingFilters.AddMedian();
				
				// Apply Gamma Correction
				//extractor.OCRImagePreprocessingFilters.AddGammaCorrection()


				// Load PDF document
                extractor.LoadDocumentFromFile(inputFile);

                // Write extracted text to output stream
                Response.Clear();
				Response.ContentType = "text/html";
				Response.Write(extractor.GetText());
				
				Response.End();
			}
		}
	}
}
