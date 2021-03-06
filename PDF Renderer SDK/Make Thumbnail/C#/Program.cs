//*******************************************************************
//       ByteScout PDF Renderer SDK		                                     
//                                                                   
//       Copyright © 2016 ByteScout - http://www.bytescout.com       
//       ALL RIGHTS RESERVED                                         
//                                                                   
//*******************************************************************

using System.Drawing;
using Bytescout.PDFRenderer;

namespace MakeThumbnail
{
	static class Program
	{
		static void Main()
		{
			// Create an instance of Bytescout.PDFRenderer.RasterRenderer object and register it
			RasterRenderer renderer = new RasterRenderer();
			renderer.RegistrationName = "demo";
			renderer.RegistrationKey = "demo";

			// Load PDF document
			renderer.LoadDocumentFromFile("multipage.pdf");

			// Get size of the page in Points (standard PDF document units; 1 Point = 1/72")
			RectangleF rectangle = renderer.GetPageRectangle(0);

			int width, height;

			if (rectangle.Width < rectangle.Height) // portrait page orientation
			{
				width = -1; // width will be calculated from height keeping the aspect ratio
				height = 100;
			}
			else // landscape page orientation
			{
				width = 100;
				height = -1; // height will be calculated from width keeping the aspect ratio
			}
			
			// Render first page of the document to JPEG image file
			renderer.Save("thumbnail.jpg", RasterImageFormat.JPEG, 0, width, height);
			
			// Open the output image file in default image viewer
			System.Diagnostics.Process.Start("thumbnail.jpg");
		}
	}
}
